import authService from "../services/auth.service";
import router from "../router/index";

const user = JSON.parse(localStorage.getItem("userF"));
const initialState = user ? { loggedIn: true } : { loggedIn: false };

export const auth = {
  namespaced: true,
  state: initialState,
  actions: {
    async login({ commit }, userData) {      
      await authService.login(userData);
      commit("logMeIn");
    },
    
    async getPermissions({ commit }) {
      const response = await authService.getPermissions();
      if(response) {
        commit("setPermissions", response.data)
      }
    },

    async logout({ commit }) {
      try {
        await authService.logout();
      } finally {
        commit("logMeOut");
      }
    },

    async register({ commit }, userData) {
      await authService.register(userData);
      commit("logMeIn");
    },
  },
  mutations: {
    logMeIn(state) {
      state.loggedIn = true;
      router.push('/')
    },
    logMeOut(state) {
      state.loggedIn = false;
    },

    setPermissions(state, data) {
      state.userPermissions = data;
    }
  },

  getters: {
    loggedIn(state) {
      return state.loggedIn;
    },
    getPermissions(state) {
      return state.userPermissions;
    }
  },
};
