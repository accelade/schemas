/**
 * Accelade Schemas
 *
 * Layout components for Accelade - Section, Tabs, Grid, Wizard, and more.
 * This package primarily uses CSS for layouts and relies on Accelade's
 * reactivity system for interactive components (tabs, wizards, collapsible sections).
 */

// Extend window type for TypeScript
declare global {
    interface Window {
        Accelade?: {
            registerPlugin?: (name: string, plugin: SchemasPlugin) => void;
            events?: {
                on: (event: string, handler: (...args: unknown[]) => void) => void;
                off: (event: string, handler: (...args: unknown[]) => void) => void;
                emit: (event: string, ...args: unknown[]) => void;
            };
        };
        AcceladeSchemas?: {
            version: string;
            init: () => void;
        };
    }
}

export interface SchemasPlugin {
    name: string;
    version: string;
    init: () => void;
}

/**
 * Schemas Manager
 * Handles initialization and integration with Accelade
 */
export class SchemasManager {
    private initialized = false;

    /**
     * Initialize the schemas plugin
     */
    init(): void {
        if (this.initialized) {
            return;
        }

        this.initialized = true;

        // Register with Accelade if available
        if (window.Accelade?.registerPlugin) {
            window.Accelade.registerPlugin('schemas', {
                name: 'schemas',
                version: '0.1.0',
                init: () => this.setupEventListeners(),
            });
        } else {
            // Standalone mode - just set up listeners
            this.setupEventListeners();
        }

        // Dispatch ready event
        document.dispatchEvent(new CustomEvent('schemas:ready', {
            detail: { manager: this },
        }));
    }

    /**
     * Set up event listeners for schema components
     */
    private setupEventListeners(): void {
        // Listen for tab changes
        document.addEventListener('click', (e) => {
            const target = e.target as HTMLElement;
            const tabButton = target.closest('[data-schema-tab]');
            if (tabButton) {
                this.handleTabClick(tabButton as HTMLElement);
            }
        });

        // Listen for section toggles
        document.addEventListener('click', (e) => {
            const target = e.target as HTMLElement;
            const sectionToggle = target.closest('[data-schema-section-toggle]');
            if (sectionToggle) {
                this.handleSectionToggle(sectionToggle as HTMLElement);
            }
        });

        // Listen for wizard navigation
        document.addEventListener('click', (e) => {
            const target = e.target as HTMLElement;
            const wizardNav = target.closest('[data-schema-wizard-nav]');
            if (wizardNav) {
                this.handleWizardNav(wizardNav as HTMLElement);
            }
        });
    }

    /**
     * Handle tab button clicks (for components not using Accelade's data component)
     */
    private handleTabClick(button: HTMLElement): void {
        const tabId = button.dataset.schemaTab;
        const container = button.closest('[data-schema-tabs]');

        if (!container || !tabId) return;

        // Emit tab change event
        const event = new CustomEvent('schema:tab:change', {
            detail: { tabId, container },
            bubbles: true,
        });
        button.dispatchEvent(event);
    }

    /**
     * Handle section collapse/expand toggles
     */
    private handleSectionToggle(toggle: HTMLElement): void {
        const section = toggle.closest('[data-schema-section]');
        if (!section) return;

        const isCollapsed = section.classList.contains('collapsed');

        // Emit section toggle event
        const event = new CustomEvent('schema:section:toggle', {
            detail: { collapsed: !isCollapsed, section },
            bubbles: true,
        });
        toggle.dispatchEvent(event);
    }

    /**
     * Handle wizard step navigation
     */
    private handleWizardNav(nav: HTMLElement): void {
        const direction = nav.dataset.schemaWizardNav;
        const wizard = nav.closest('[data-schema-wizard]');

        if (!wizard || !direction) return;

        // Emit wizard nav event
        const event = new CustomEvent('schema:wizard:navigate', {
            detail: { direction, wizard },
            bubbles: true,
        });
        nav.dispatchEvent(event);
    }
}

// Create singleton instance
const manager = new SchemasManager();

/**
 * Initialize Schemas when DOM is ready
 */
function init(): void {
    // Prevent multiple initializations
    if (window.AcceladeSchemas) {
        return;
    }

    const doInit = (): void => {
        manager.init();

        // Expose global API
        window.AcceladeSchemas = {
            version: '0.1.0',
            init: () => manager.init(),
        };
    };

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', doInit);
    } else {
        doInit();
    }
}

// Auto-initialize
init();

// Export for module usage
export { manager as schemasManager };
