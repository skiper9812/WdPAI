/**
 * Theme management script (Dark / Light mode)
 * - Uses `data-theme` attribute on `<html>` (`document.documentElement`)
 * - Persists user choice in `localStorage` under `'theme'`
 * - Falls back to OS preference via `window.matchMedia('(prefers-color-scheme: light)')`
 * - Listens for live OS preference changes when no manual override is stored
 */
(function () {
    const STORAGE_KEY = 'theme';
    const rootElement = document.documentElement;
    const colorSchemeQuery = window.matchMedia
        ? window.matchMedia('(prefers-color-scheme: light)')
        : null;

    function getSystemTheme() {
        return colorSchemeQuery && colorSchemeQuery.matches ? 'light' : 'dark';
    }

    function getSavedTheme() {
        try {
            const stored = localStorage.getItem(STORAGE_KEY);
            return stored === 'light' || stored === 'dark' ? stored : null;
        } catch (_err) {
            return null;
        }
    }

    function saveTheme(theme) {
        try {
            localStorage.setItem(STORAGE_KEY, theme);
        } catch (_err) {
            // Ignore storage errors (e.g. private browsing restrictions)
        }
    }

    function updateToggleUI(theme) {
        const toggleBtn = document.getElementById('theme-toggle');
        if (!toggleBtn) return;

        const isLight = theme === 'light';
        const label = toggleBtn.querySelector('.etykieta-motywu');
        if (label) {
            label.textContent = isLight ? 'Tryb jasny' : 'Tryb ciemny';
        }
        toggleBtn.setAttribute('aria-pressed', String(isLight));
        toggleBtn.setAttribute(
            'aria-label',
            isLight ? 'Przełącz na tryb ciemny' : 'Przełącz na tryb jasny'
        );
    }

    function applyTheme(theme) {
        rootElement.setAttribute('data-theme', theme);
        if (document.body) {
            document.body.classList.toggle('light-mode', theme === 'light');
        }
        updateToggleUI(theme);
    }

    // Apply immediately on script execution to minimize FOUC
    const initialTheme = getSavedTheme() || getSystemTheme();
    applyTheme(initialTheme);

    function initThemeControls() {
        applyTheme(getSavedTheme() || getSystemTheme());

        const toggleBtn = document.getElementById('theme-toggle');
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function () {
                const currentTheme = rootElement.getAttribute('data-theme') === 'light' ? 'light' : 'dark';
                const nextTheme = currentTheme === 'light' ? 'dark' : 'light';
                applyTheme(nextTheme);
                saveTheme(nextTheme);
            });
        }

        if (colorSchemeQuery) {
            const handleSystemChange = function (event) {
                if (!getSavedTheme()) {
                    applyTheme(event.matches ? 'light' : 'dark');
                }
            };
            if (typeof colorSchemeQuery.addEventListener === 'function') {
                colorSchemeQuery.addEventListener('change', handleSystemChange);
            } else if (typeof colorSchemeQuery.addListener === 'function') {
                colorSchemeQuery.addListener(handleSystemChange);
            }
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initThemeControls);
    } else {
        initThemeControls();
    }
})();
