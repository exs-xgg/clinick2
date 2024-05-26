import { CyGetOptions, CyGetReturnType } from "./types";

export const getbyTestAttr = (value: string, options?: CyGetOptions): CyGetReturnType => {
    return cy.get(`[data-test="${value}"]`, options);
};
