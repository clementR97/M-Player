const canvas = document.getElementById('wave-canvas');
const ctx = canvas.getContext('2d');

canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

const waveColors = [
    'rgba(85, 214, 255, 0.7)',
     'rgba(0, 100, 255, 0.5)',
    'rgba(206, 85, 255, 0.7)'
];

function drawWave(color, amplitude, frequency, phase) {
    ctx.beginPath();
    ctx.moveTo(0, canvas.height / 2);

    for (let x = 0; x <= canvas.width; x++) {
        const y = canvas.height / 2 + amplitude * Math.sin((x + phase) * frequency);
        ctx.lineTo(x, y);
    }

    ctx.lineTo(canvas.width, canvas.height);
    ctx.lineTo(0, canvas.height);
    ctx.closePath();

    ctx.fillStyle = color;
    ctx.fill();
}

let phase = 0;
const phaseIncrement = 0.7; // Réduire cette valeur pour une animation plus lente

function animate() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    for (let i = 0; i < waveColors.length; i++) {
        drawWave(waveColors[i], 100, 0.005, phase + i * 200);
    }

    phase += phaseIncrement;

    requestAnimationFrame(animate);
}

animate();

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});
