<style>
    .bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        background: #000;
        border-top: 4px solid #FFC50F;
        z-index: 50;
        box-shadow: 0 -10px 25px rgba(0, 0, 0, 0.3);
    }

    .nav-container {
        position: relative;
        padding-top: 8px;
    }

    .center-button-container {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        top: -24px;
        z-index: 20;
    }

    .center-button {
        width: 64px;
        height: 64px;
        background: linear-gradient(135deg, #FFC50F 0%, #FFB300 100%);
        color: #000;
        border-radius: 50%;
        border: 4px solid #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 800;
        box-shadow: 0 8px 25px rgba(255, 197, 15, 0.4);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .center-button:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(255, 197, 15, 0.5);
    }

    .nav-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        text-align: center;
        padding-top: 32px;
    }

    .nav-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 12px 0;
        color: #fff;
        transition: all 0.2s ease;
        position: relative;
        cursor: pointer;
    }

    .nav-item.active {
        color: #FFC50F;
        background: rgba(255, 197, 15, 0.05);
    }

    .nav-item.active::before {
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 48px;
        height: 3px;
        background: #FFC50F;
        border-radius: 4px;
    }

    .nav-item:hover {
        color: #FFC50F;
    }

    .nav-item:hover .nav-icon {
        transform: scale(1.1);
    }

    .nav-icon {
        width: 28px;
        height: 28px;
        margin-bottom: 4px;
        transition: transform 0.2s ease;
    }

    .nav-label {
        font-size: 12px;
        font-weight: 600;
    }

    .esim-illustration {
        width: 32px;
        height: 32px;
        margin-bottom: 2px;
    }

    @media (min-width: 768px) {
        .bottom-nav {
            display: none;
        }
    }
</style>

<nav class="bottom-nav">
    <div class="nav-container">
        <!-- Enhanced Center Button -->
        <div class="center-button-container">
            <a href="/my_esim" class="block">
                <button class="center-button">
                    <svg class="esim-illustration" viewBox="0 0 40 40" fill="none">
                        <rect x="8" y="12" width="24" height="16" rx="2" fill="#fff"/>
                        <rect x="12" y="16" width="16" height="8" rx="1" fill="#000"/>
                        <circle cx="16" cy="20" r="1" fill="#FFC50F"/>
                        <circle cx="20" cy="20" r="1" fill="#FFC50F"/>
                        <circle cx="24" cy="20" r="1" fill="#FFC50F"/>
                        <path d="M10 10V30M30 10V30" stroke="#FFC50F" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                    <span class="nav-label">My eSIM</span>
                </button>
            </a>
        </div>

        <!-- Navigation Items -->
        <div class="nav-grid">
            <!-- Home - Active -->
            <div class="nav-item active">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="nav-label">Home</span>
            </div>

            <!-- Browse Countries -->
            <a href="/countries" class="nav-item{{ request()->is('countries') ? ' active' : '' }}">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="12" cy="12" r="10" stroke-width="2" stroke="currentColor" fill="none" />
                    <path stroke-width="2" stroke="currentColor" fill="none" d="M2 12h20M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20" />
                </svg>
                <span class="nav-label">Browse</span>
            </a>

            <!-- Spacer for center button -->
            <div></div>

            <!-- Countries -->
            <a href="{{ route('countries.index') }}" class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 2a10 10 0 100 20 10 10 0 000-20zm0 0v20m0-20C7.03 2 2 7.03 2 12s5.03 10 10 10 10-5.03 10-10S16.97 2 12 2z" />
                </svg>
                <span class="nav-label">Countries</span>
            </a>

            <!-- Support -->
            <div class="nav-item">
                <svg class="nav-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                    </path>
                </svg>
                <span class="nav-label">Support</span>
            </div>
        </div>
    </div>
</nav>

<script>
    // Add click handlers for navigation items
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all items
            document.querySelectorAll('.nav-item').forEach(i => {
                i.classList.remove('active');
            });
            // Add active class to clicked item
            this.classList.add('active');
        });
    });
</script>
