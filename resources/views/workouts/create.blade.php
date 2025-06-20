@extends('layouts.app')

@section('title', 'Create Workout')

@section('content')
    <style>
        /* ... keep your existing styles ... */
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem;
            color: #2d3748;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 2rem;
            border-radius: 20px;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-align: center;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #4a5568;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 0.8rem 1rem;
            border-radius: 10px;
            border: 1px solid #cbd5e0;
            margin-bottom: 1.5rem;
            font-size: 1rem;
            background: #f7fafc;
            transition: border-color 0.3s ease;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #667eea;
            outline: none;
            background: #fff;
        }

        .submit-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.9rem 2rem;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .fixed-back-button {
            position: fixed;
            top: 1rem;
            left: 1rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: background 0.3s ease, transform 0.2s ease;
            z-index: 1001;
        }

        .fixed-back-button:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            transform: translateY(-2px);
        }

        .step-group {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 1.2rem;
            margin-bottom: 1.5rem;
            background: #f9fafb;
            position: relative;
        }

        .remove-step-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: #e53e3e;
            color: #fff;
            border: none;
            border-radius: 50%;
            width: 2rem;
            height: 2rem;
            font-size: 1.2rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .add-step-btn {
            background: #667eea;
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 0.7rem 1.5rem;
            font-weight: 600;
            cursor: pointer;
            margin-bottom: 1.5rem;
            transition: background 0.2s;
        }

        .add-step-btn:hover {
            background: #5a67d8;
        }
    </style>

    <a href="{{ url()->previous() }}" class="fixed-back-button">
        <span class="back-icon">&#8592;</span> Back
    </a>

    <div class="form-container">
        <h1 class="form-title">Create New Workout</h1>

        <form action="{{ route('workouts.store') }}" method="POST" id="workoutForm">
            @csrf

            <label for="title">Workout Title</label>
            <input type="text" id="title" name="title" placeholder="e.g. Strength Circuit" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Write workout description..."
                required></textarea>

            <label for="duration">Duration (in seconds)</label>
            <input type="text" id="duration" name="duration" placeholder="e.g. 30 seconds" required>

            <label for="sport">Sport</label>
            <select id="sport" name="sport" required>
                <option value="">Select Sport</option>
                <option value="football">Football</option>
                <option value="basketball">Basketball</option>
                <option value="swimming">Swimming</option>
                <option value="tennis">Tennis</option>
                <!-- Vairāk sporta veidi -->
            </select>


            <hr style="margin: 2rem 0;">

            <h2 style="font-size:1.3rem;font-weight:700;margin-bottom:1rem;">Workout Steps</h2>
            <div id="steps-container">
                <!-- Repi šeit -->
            </div>
            <button type="button" class="add-step-btn" onclick="addStep()">+ Add Step</button>

            <button type="submit" class="submit-btn">Save Workout</button>
        </form>
    </div>

    <template id="step-template">
        <div class="step-group">
            <button type="button" class="remove-step-btn" onclick="removeStep(this)" title="Remove Step">&times;</button>
            <label>Step Title</label>
            <input type="text" name="steps[__INDEX__][title]" placeholder="e.g. Warm-up" required>
            <label>Step Description</label>
            <textarea name="steps[__INDEX__][description]" rows="2" placeholder="Describe this step..." required></textarea>
            <label>Step Duration</label>
            <input type="text" name="steps[__INDEX__][time]" placeholder="e.g. 50 seconds" required>
            <label>Step Repetitions</label>
            <input type="number" name="steps[__INDEX__][repetitions]" min="0" max="100" placeholder="e.g. 50 repetitions"
                required>
            <input type="hidden" name="steps[__INDEX__][order]" value="__INDEX__">
        </div>
    </template>

    <script>
        let stepIndex = 0;

        function addStep(data = {}) {
            const template = document.getElementById('step-template').innerHTML;
            let html = template.replace(/__INDEX__/g, stepIndex);
            const container = document.getElementById('steps-container');
            const tempDiv = document.createElement('div');
            tempDiv.innerHTML = html;
            const stepDiv = tempDiv.firstElementChild;

            // Optionally prefill data
            if (data.title) stepDiv.querySelector('input[name^="steps"]').value = data.title;
            if (data.description) stepDiv.querySelector('textarea[name^="steps"]').value = data.description;
            if (data.duration) stepDiv.querySelector('input[name^="steps"][type="text"]:not([name$="[title]"])').value = data.time;
            if (data.repetitions) stepDiv.querySelector('input[name^="steps"][type="text"]:not([name$="[title]"])').value = data.time;

            container.appendChild(stepDiv);
            stepIndex++;
        }

        function removeStep(btn) {

            btn.closest('.step-group').remove();
        }

        document.addEventListener('DOMContentLoaded', function () {
            if (document.getElementById('steps-container').children.length === 0) {
                addStep();
            }
        });
    </script>
@endsection