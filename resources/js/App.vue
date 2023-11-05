<template>
    <div>
        <div v-if="token != '' && token != null && token != undefined">
            <!-- Navbar -->
            <nav
                class="main-header navbar navbar-expand navbar-white navbar-light"
            >
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a
                            class="nav-link bar-code"
                            data-widget="pushmenu"
                            href="#"
                            role="button"
                            ><i class="fas fa-bars"></i
                        ></a>
                    </li>
                </ul>
            </nav>
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <menu-component />
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        <router-view></router-view>
                    </div>
                    <!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
            </div>
        </div>
        <div v-else>
            <div
                class="container d-flex justify-content-center align-items-center"
                style="height: 100vh"
            >
                <div class="col-md-6">
                    <div
                        class="d-flex justify-content-center align-items-center"
                        style="height: 100%"
                    >
                        <img
                            :src="`../../template/dist/img/logo.jpg`"
                            id="login-logo"
                            alt="Logo Home"
                        />
                    </div>

                    <div class="card">
                        <div class="card-header">Iniciar Sesión</div>
                        <div class="card-body">
                            <form @submit.prevent="login">
                                <div class="mb-3">
                                    <label for="correo" class="form-label"
                                        >Correo</label
                                    >
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        placeholder="Correo"
                                        v-model="email"
                                    />
                                </div>
                                <div class="mb-3">
                                    <label for="contrasena" class="form-label"
                                        >Contraseña</label
                                    >
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        placeholder="Contraseña"
                                        v-model="password"
                                    />
                                </div>
                                <button
                                    type="submit"
                                    class="btn btn-primary login-button"
                                >
                                    Iniciar Sesión
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            token: "",
            email: "",
            password: "",
            names: "",
            rol_id: "",
        };
    },
    created() {
        this.token = localStorage.getItem("token");
        this.names = localStorage.getItem("names");
        this.email = localStorage.getItem("email");
    },
    methods: {
        login() {
            const formData = new FormData();
            formData.append("email", this.email);
            formData.append("password", this.password);

            this.loading = true;

            axios
                .post("https://binfrix.com/api/user/login", formData)
                .then((response) => {
                    console.log(response.data.data.user.name);

                    this.token = response.data.data.token;
                    this.names = response.data.data.user.name;
                    this.email = response.data.data.user.email;

                    localStorage.setItem('token', this.token)
                    localStorage.setItem('names', this.names)
                    localStorage.setItem('email', this.email)
                })
                .catch((error) => {
                    if (
                        error ==
                        "AxiosError: Request failed with status code 401"
                    ) {
                        this.incorrect_login_data = true;
                        this.loading = false;
                    }
                });
        },
    },
};
</script>
