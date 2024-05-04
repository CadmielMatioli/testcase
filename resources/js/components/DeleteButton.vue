<template>
    <div>
        <AlertMessage ref="alertMessage" @changeAlert="changeAlert" :typeAlert="typeAlert" />

        <button type="button"
                class="bg-red-600 text-white inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150"
                :url="url" @click="remove">

            <i class="fa-solid fa-trash mr-2"></i>
            Delete</button>
    </div>
</template>

<script>
import AlertMessage from "./AlertMessage.vue";
export default {
    props: {
        csrfToken: null,
        url: null,
    },
    components: {
        AlertMessage,
    },
    data() {
        return {
            typeAlert: {}
        }
    },

    methods: {

        remove() {
            this.$refs.alertMessage.successWithModalControll({
                typeModal: 'successWithModalControll',
                title: 'Tem certeza que deseja deletar?',
                // text: "Essa ação é irreversível!",
                message: `Essa ação é irreversível`,
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                showConfirmButton: true,
                confirmButtonText: "Sim, deletar!",
            }).then((result) => {
                if (result.isConfirmed) {
                    this.changeAlert();
                }
            }).catch((error) => {
                console.error(error);
            });
        },

        changeAlert() {
            fetch(this.url, {
                headers: {
                    "X-CSRF-Token": this.csrfToken
                },
                method: 'delete'
            }).then(async res => {
                if (res.status == 200) {
                    const response = await res.json();
                    this.typeAlert = {
                        typeModal: 'successWithModal',
                        message: response.message
                    }
                }
                else {
                    const errorResponse = await res.json();
                    this.typeAlert = {
                        typeModal: 'errorWithModal',
                        message: errorResponse.message
                    }
                }
            });
        }
    },

};
</script>
