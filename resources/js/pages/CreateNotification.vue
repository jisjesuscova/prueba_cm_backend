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
                                            <div class="col-md-4">
                                                <label for="rut"
                                                    >RUT
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    v-mask="['########-X']"
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="rut_input"
                                                    placeholder="RUT"
                                                    aria-label="RUT"
                                                />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="alliance_name"
                                                    >Nombre de la Alianza
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="name_input"
                                                    placeholder="Nombre de la Alianza"
                                                    aria-label="Nombre de la Alianza"
                                                />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="alliance_alias"
                                                    >Alias de Alianza
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="alia_input"
                                                    placeholder="Alias de la Alianza"
                                                    aria-label="Nombre de la Alianza"
                                                />
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <label for="alliance_contact"
                                                    >Contácto
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="text"
                                                    class="form-control"
                                                    v-model="contact_input"
                                                    placeholder="Contácto"
                                                    aria-label="Contácto"
                                                />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="alliance_email"
                                                    >Correo de Contácto
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="email"
                                                    class="form-control"
                                                    v-model="
                                                        contact_email_input
                                                    "
                                                    placeholder="Correo de Contácto"
                                                    aria-label="Correo de Contácto"
                                                />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="alliance_phone"
                                                    >Teléfono de Contácto<span
                                                        class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="number"
                                                    class="form-control"
                                                    v-model="
                                                        contact_phone_input
                                                    "
                                                    placeholder="Teléfono de Contácto"
                                                    aria-label="Teléfono de Contácto"
                                                />
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <label for="alliance_start_date"
                                                    >Fecha de Inicio
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="date"
                                                    class="form-control"
                                                    v-model="start_date_input"
                                                    placeholder="Fecha de Inicio"
                                                    aria-label="Fecha de Inicio"
                                                />
                                            </div>
                                            <div class="col-md-4">
                                                <label for="alliance_end_date"
                                                    >Fecha de Fin
                                                    <span class="text-danger"
                                                        >*</span
                                                    ></label
                                                >
                                                <input
                                                    required
                                                    type="date"
                                                    class="form-control"
                                                    v-model="end_date_input"
                                                    placeholder="Fecha de Fin"
                                                    aria-label="Fecha de Fin"
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
                                                    Guardar
                                                </button>

                                                <router-link
                                                    href="javascript:;"
                                                    to="/alliances"
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
            rut_input: "",
            name_input: "",
            alia_input: "",
            contact_input: "",
            contact_email_input: "",
            contact_phone_input: "",
            start_date_input: "",
            end_date_input: "",
        };
    },
    methods: {
        async submit() {
            this.isLoading = true;
            const token = localStorage.getItem("token");

            const formData = new FormData();

            formData.append("rut", this.rut_input);
            formData.append("name", this.name_input);
            formData.append("alias", this.alia_input);
            formData.append("contact", this.contact_input);
            formData.append("contact_email", this.contact_email_input);
            formData.append("contact_phone", this.contact_phone_input);
            formData.append("start_date", this.start_date_input);
            formData.append("end_date", this.end_date_input);

            try {
                const response = await axios.post(
                    "https://binfrix.com/api/alliance/store",
                    formData,
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            "Content-Type": "multipart/form-data",
                        },
                    }
                );

                this.posts = response.data.data;
                this.isLoading = false;
            } catch (error) {
                console.error("Error al guardar la alianza:", error);
            }
        },
    },
    async mounted() {
        setTimeout(() => {
            this.loading = false;
        }, 5000);
    },
};
</script>
