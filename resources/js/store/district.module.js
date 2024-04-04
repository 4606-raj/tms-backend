import districtService from "../services/district.service";

const initialState = [];

export const district = {
  namespaced: true,
  state: initialState,
  actions: {
    async fetchAll({ commit }) {      
      let response = await districtService.fetchAll();
      
      commit("setDistrict", response);
    },

  },
  mutations: {
    setDistrict(state, payload) {
      state.district = payload;
    },
  },

  getters: {
    getAll(state) {
      return state.district;
    },
  },
};
