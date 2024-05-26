import * as customCommands from "./commands";

// To simplify adding custom commands to commands.ts, rather than following cypress conventions

Object.entries(customCommands).forEach(([key, value]) => {
    Cypress.Commands.add(key as any, value);
});

type CustomCommands = typeof customCommands;
declare global {
    namespace Cypress {
        // eslint-disable-next-line @typescript-esline/no-empty-interface
        interface Chainable extends CustomCommands{}
    }
}
