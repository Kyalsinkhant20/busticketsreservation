<style>
    .alert-custom {
        position: relative;
        border-radius: 0.375rem;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .alert-custom .btn-close {
        position: absolute;
        top: 0.5rem;
        right: 0.5rem;
    }

    .alert-custom.success {
        background-color: #d4edda;
        color: #155724;
        border-color: #c3e6cb;
    }

    .alert-custom.error {
        background-color: #f8d7da;
        color: #721c24;
        border-color: #f5c6cb;
    }

    .alert-custom.warning {
        background-color: #fff3cd;
        color: #856404;
        border-color: #ffeeba;
    }

    .alert-custom.info {
        background-color: #d1ecf1;
        color: #0c5460;
        border-color: #bee5eb;
    }
</style>

<main>
    
    @if (session('success'))
        <div class="alert alert-custom success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-custom error alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('warning'))
        <div class="alert alert-custom warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('info'))
        <div class="alert alert-custom info alert-dismissible fade show" role="alert">
            {{ session('info') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-custom error alert-dismissible fade show" role="alert">
            <strong>Please check the form below for errors</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</main>