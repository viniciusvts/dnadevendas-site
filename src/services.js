import axios from "axios";

const url = "https://dnadevendas.com.br/wp-json";

const axiosInstance = axios.create({
  baseURL: url + "/api"
});

export const api = {
  get(endpoint) {
    return axiosInstance.get(endpoint);
  },
  post(endpoint, body) {
    return axiosInstance.post(endpoint, body);
  },
  put(endpoint, body) {
    return axiosInstance.put(endpoint, body);
  },
  delete(endpoint) {
    return axiosInstance.delete(endpoint);
  },
  login(body) {
    return axios.post(url + "/jwt-auth/v1/token", body);
  },
  validateToken() {
    return axiosInstance.post(url + "/jwt-auth/v1/token/validate");
  }
};

export function getCep(cep) {
  return axios.get(`https://viacep.com.br/ws/${cep}/json/`);
}
