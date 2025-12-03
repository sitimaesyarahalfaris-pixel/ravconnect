<style>
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #000;
        border-top: 4px solid #FFC50F;
        z-index: 50;
        box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.3);
        padding: 8px 0 4px;
    }

    .nav-grid {
        display: grid;
        grid-template-columns: 1fr 1fr auto 1fr 1fr;
        align-items: end;
        position: relative;
        max-width: 100%;
        margin: 0 auto;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 8px 4px;
        color: #fff;
        transition: all 0.2s ease;
        cursor: pointer;
        position: relative;
    }

    .nav-item.active {
        color: #FFC50F;
    }

    .nav-item.active::before {
        content: '';
        position: absolute;
        top: -4px;
        left: 50%;
        transform: translateX(-50%);
        width: 24px;
        height: 3px;
        background: #FFC50F;
        border-radius: 2px;
    }

    .nav-item:hover {
        color: #FFC50F;
    }

    .nav-icon {
        width: 24px;
        height: 24px;
        margin-bottom: 4px;
        transition: transform 0.2s ease;
    }

    .nav-item:hover .nav-icon {
        transform: scale(1.1);
    }

    .nav-label {
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
    }

    /* Center Button */
    .center-button-wrapper {
        position: relative;
        display: flex;
        justify-content: center;
        margin-bottom: 8px;
    }

    .center-button {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #FFC50F 0%, #FFB300 100%);
        color: #000;
        border-radius: 50%;
        border: 4px solid #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        box-shadow: 0 4px 20px rgba(255, 197, 15, 0.5);
        transition: all 0.3s ease;
        cursor: pointer;
        position: relative;
        top: -30px;
        margin: 0 8px;
    }

    .center-button:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 25px rgba(255, 197, 15, 0.6);
    }

    .esim-icon {
        font-size: 36px;
        margin-bottom: 4px;
        color: #000;
    }

    .center-label {
        font-size: 12px;
        font-weight: 800;
        position: absolute;
        bottom: -20px;
        color: #000;
        white-space: nowrap;
        background: #FFC50F;
        padding: 3px 10px;
        border-radius: 14px;
        border: 2px solid #fff;
    }

    @media (min-width: 768px) {
        .bottom-nav {
            display: none;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<nav class="bottom-nav">
    <div class="nav-grid">
        <!-- Home -->
        <a href="/" class="nav-item{{ request()->is('/') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="nav-label">Home</span>
        </a>

        <!-- Browse Countries -->
        <a href="/countries" class="nav-item{{ request()->is('countries') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="none" />
                <path stroke-width="2" stroke="currentColor" fill="none" d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
            </svg>
            <span class="nav-label">Browse</span>
        </a>

        <!-- Center Button -->
        <div class="center-button-wrapper">
            <a href="/my_esim">
                <button class="center-button">
                    <i class="fas fa-sim-card esim-icon"></i>
                    <span class="center-label">My eSIM</span>
                </button>
            </a>
        </div>

        <!-- Cart -->
        <a href="/cart" class="nav-item{{ request()->is('cart') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span class="nav-label">Cart</span>
        </a>

        <!-- Support -->
        <a href="/support" class="nav-item{{ request()->is('support') ? ' active' : '' }}">
            <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            <span class="nav-label">Support</span>
        </a>
    </div>
</nav>

<script>
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.nav-item').forEach(i => {
                i.classList.remove('active');
            });
            this.classList.add('active');
        });
    });
</script>
