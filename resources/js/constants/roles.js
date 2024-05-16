export const ADMIN = 'admin';
export const AGENT = 'agent';
export const ALL = 'all';
export const DCRIM = 'dcrim';
export const OPERATOR = 'operator';
export const PROCESS = 'process';
export const TECHNICAL ='technical';
export const ZCRIM = 'zcrim';

export default {
  TICKET_MANAGEMENT: [ ADMIN, OPERATOR],
  USER_MANAGEMENT: [ADMIN],
  CREATE_TICKET: [OPERATOR],
  ALL: [ADMIN, AGENT, DCRIM, ZCRIM, OPERATOR, PROCESS, TECHNICAL],
};
