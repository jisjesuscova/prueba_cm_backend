<template>
    <div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div v-if="loading">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12 text-center loading">
                                        <div
                                            class="d-flex flex-column align-items-center"
                                        >
                                            <img
                                                :src="`../../template/dist/img/spinner.gif`"
                                                alt=""
                                                height="70"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-else>
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Crear Notificación</h3>
                                </div>
                                <form @submit.prevent="submit">
                                    <div class="card-body">
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <label for="message"
                                                    >Titulo
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="title_input"
                                                    placeholder="Título"
                                                    aria-label="Título"
                                                />
                                            </div>
                                            <div class="col-md-6">
                                                <label for="message"
                                                    >Mensaje
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="message_input"
                                                    placeholder="Mensaje"
                                                    aria-label="Mensaje"
                                                />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <div class="row">
                                            <div class="col-md-12 w-full">
                                                <button
                                                    type="submit"
                                                    class="btn btn-success mr-2"
                                                >
                                                    <i
                                                        class="fa-solid fa-check"
                                                    ></i>
                                                    Enviar
                                                </button>

                                                <router-link
                                                    href="javascript:;"
                                                    to="/notifications"
                                                    class="btn btn-danger ml-2"
                                                >
                                                    <i
                                                        class="fa-solid fa-remove"
                                                    ></i>
                                                    Cancelar
                                                </router-link>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mask } from "vue-the-mask";

export default {
    directives: { mask },
    data() {
        return {
            loading: true,
            title_input: "",
            message_input: ""
        };
    },
    methods: {
        async submit() {
            this.loading = true;
            const token = localStorage.getItem("token");

            const formData = new FormData();

            formData.append("title", this.title_input);
            formData.append("message", this.message_input);

            try {
                const response = await axios.post(
                    "https://binfrix.com/api/notification/store",
                    formData,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "Content-Type": "multipart/form-data",
                        },
                    }
                );

                this.$router.push('/notifications')
                this.loading = false;
            } catch (error) {
                console.error("Error al guardar la notificación:", error);
            }
        },
    },
    async mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 2000);
    },
};
</script>
