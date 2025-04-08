<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <title>Counter Style</title>
    <style>
        .counter {
            position: relative;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            text-align: center;
            background: #ECEBE9;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2), 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .counter::before {
            content: '';
            position: absolute;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: white;
            box-shadow: inset 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .counter .counter-content {
            position: relative;
            z-index: 10;
        }
    </style>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-10">Counter Style: Demo 301</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="relative flex flex-col items-center">
                <div class="counter bg-gradient-to-r from-pink-400 to-pink-600 text-white flex flex-col items-center justify-center">
                    <div class="counter-content">
                        <i class="fa fa-globe text-3xl"></i>
                        <h3 class="text-lg font-semibold">Web Designing</h3>
                        <span class="counter-value text-3xl font-bold" data-target="1963">0</span>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col items-center">
                <div class="counter bg-gradient-to-r from-red-400 to-red-700 flex flex-col items-center justify-center">
                    <div class="counter-content">
                        <i class="fa fa-rocket text-3xl"></i>
                        <h3 class="text-lg font-semibold">Web Development</h3>
                        <span class="counter-value text-3xl font-bold" data-target="2056">0</span>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col items-center">
                <div class="counter bg-gradient-to-r from-purple-400 to-purple-700  flex flex-col items-center justify-center">
                    <div class="counter-content">
                        <i class="fa fa-user text-3xl"></i>
                        <h3 class="text-lg font-semibold">Brand Building</h3>
                        <span class="counter-value text-3xl font-bold" data-target="1756">0</span>
                    </div>
                </div>
            </div>
            <div class="relative flex flex-col items-center">
                <div class="counter bg-gradient-to-r from-green-400 to-green-700  flex flex-col items-center justify-center">
                    <div class="counter-content">
                        <i class="fa fa-briefcase text-3xl"></i>
                        <h3 class="text-lg font-semibold">Responsive Design</h3>
                        <span class="counter-value text-3xl font-bold" data-target="1823">0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const counters = document.querySelectorAll(".counter-value");
            counters.forEach(counter => {
                let target = +counter.getAttribute("data-target");
                let count = 0;
                let step = Math.ceil(target / 100);
                let updateCounter = () => {
                    if (count < target) {
                        count += step;
                        counter.innerText = count;
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCounter();
            });
        });
    </script>
</body>
</html>
