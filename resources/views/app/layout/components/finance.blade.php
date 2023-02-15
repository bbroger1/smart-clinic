<section class="finance">
    <div class="finance-card card01">
        <i class="fa-solid fa-stethoscope finance-icon"></i>
        <p class="finance-number">{{ $querysCount }}</p>
        <p class="finance-title">Consultas</p>
    </div>

    <div class="finance-card card02">
        <i class="fa-solid fa-users finance-icon"></i>
        <p class="finance-number">{{ $doctorsCount }}</p>
        <p class="finance-title">Medicos</p>
    </div>

    <div class="finance-card card03">
        <i class="fa-solid fa-dollar-sign finance-icon"></i>
        <p class="finance-number">{{ $confimedQuery }}</p>
        <p class="finance-title">Consultas Confirmadas</p>
    </div>
</section>