export default {
  methods: {
    sendMail() {
      const url = 'https://www.lafaetelocacao.com.br/wp-json/contact-form-7/v1/contact-forms/13170/feedback';
      const username = 'pedro@dnadevendas.com.br';
      const password = 'suporte123';
      const formData = new FormData();

      formData.append("your-name", this.newsSinup[0].nome);
      formData.append("your-email", this.newsSinup[0].from);
      const auth = Buffer.from(username + ":" + password).toString('base64');
      const request = new XMLHttpRequest();
      request.open("POST", url, true, auth);
      request.withCredentials = true;
      request.send(formData);
    },
  },
}
