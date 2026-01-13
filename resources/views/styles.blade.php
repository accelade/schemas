{{-- Schemas CSS - Layout styling for schema components --}}
<style>
    /* Schemas component default CSS variables */
    /* These are fallbacks when not using Accelade's docs layout */
    :root {
        --schemas-bg: #ffffff;
        --schemas-bg-alt: #f8fafc;
        --schemas-text: #0f172a;
        --schemas-text-muted: #64748b;
        --schemas-border: #e2e8f0;
        --schemas-primary: #4f46e5;
    }

    .dark, [data-theme="dark"] {
        --schemas-bg: #0f172a;
        --schemas-bg-alt: #1e293b;
        --schemas-text: #f1f5f9;
        --schemas-text-muted: #94a3b8;
        --schemas-border: #334155;
        --schemas-primary: #6366f1;
    }

    /* Map to docs variables if available */
    @supports (color: var(--docs-bg)) {
        :root {
            --schemas-bg: var(--docs-bg, #ffffff);
            --schemas-bg-alt: var(--docs-bg-alt, #f8fafc);
            --schemas-text: var(--docs-text, #0f172a);
            --schemas-text-muted: var(--docs-text-muted, #64748b);
            --schemas-border: var(--docs-border, #e2e8f0);
        }
    }

    /* Collapsible section animations */
    [data-schema-section] .section-content {
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

    [data-schema-section].collapsed .section-content {
        max-height: 0;
    }

    [data-schema-section] .section-toggle-icon {
        transition: transform 0.2s ease;
    }

    [data-schema-section].collapsed .section-toggle-icon {
        transform: rotate(-90deg);
    }

    /* Tab transitions */
    [data-schema-tabs] .tab-panel {
        animation: schemas-fade-in 0.15s ease-out;
    }

    @keyframes schemas-fade-in {
        from {
            opacity: 0;
            transform: translateY(4px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Wizard step animations */
    [data-schema-wizard] .step-content {
        animation: schemas-fade-in 0.2s ease-out;
    }

    /* RTL support */
    [dir="rtl"] [data-schema-wizard] .nav-icon {
        transform: scaleX(-1);
    }

    [dir="rtl"] [data-schema-tabs].vertical .tab-list {
        border-inline-end: none;
        border-inline-start: 1px solid var(--schemas-border);
    }
</style>
