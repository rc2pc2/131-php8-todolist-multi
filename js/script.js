// 
const { createApp } = Vue

createApp({
    data() {
        return {
            apiUrl: "http://localhost/131-php8-todolist-multi/api/server.php",
            apiPostUrl: "http://localhost/131-php8-todolist-multi/api/add-todo.php",
            todoList : [],
            newTitle: "",
            // % aggiungere una stringa in v-model con l'input di inserimento
            // # aggiungere un nuovo metodo per effettuare una chiamata post per un nuovo todoItem
            // ! collegare l'evento di invio (o click sul bottone) con il metodo creato
        }
    },
    methods:{
        getDiscs(url){
            axios.get(url)
                .then((response) => {
                    console.log(response.data);
                    this.todoList = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
        },

        addTodo(content){
            // # chiamata post con axios
            const data = { title: content };
            const headers = {
                headers: { 'Content-Type': 'multipart/form-data' }
            };

            axios.post(this.apiPostUrl, data, headers)
            .then((response) => {
                console.log(response);
            })
            .catch(function (error) {
                console.log(error);
            }).finally(() => {
                this.newTitle = "";
            });
        }
    },
    created(){
        this.getDiscs(this.apiUrl);
    }
}).mount('#app');