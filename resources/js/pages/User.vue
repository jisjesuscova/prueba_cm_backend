<template>
    <div>
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 margin-left">
                        <h1>Usuarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">

                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
            <div class="container-fluid">
                <div class="row" v-if="posts.total > 0">
                    <div class="col-12">
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Datos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <o-table
                                        :loading="isLoading"
                                        :data="
                                            posts.current_page &&
                                            posts.data.length == 0
                                                ? []
                                                : posts.data
                                        "
                                    >
                                        <o-table-column
                                            field="id"
                                            label="Id"
                                            numeric
                                            v-slot="p"
                                        >
                                            {{ p.row.id }}
                                        </o-table-column>
                                        <o-table-column
                                            field="name"
                                            label="Nombre"
                                            v-slot="p"
                                        >
                                            {{ p.row.name }}
                                        </o-table-column>
                                        <o-table-column
                                            field="email"
                                            label="Correo"
                                            v-slot="p"
                                        >
                                            {{ p.row.email }}
                                        </o-table-column>
                                        <o-table-column
                                            field="updated_at"
                                            label="Última actualización"
                                            v-slot="p"
                                        >
                                            {{ p.row.updated_at }}
                                        </o-table-column>
                                    </o-table>
                                    <hr />
                                    <o-pagination
                                        v-if="
                                            posts.current_page &&
                                            posts.data.length > 0
                                        "
                                        @change="updatePage"
                                        :total="posts.total"
                                        v-model:current="currentPage"
                                        :range-before="2"
                                        :range-after="2"
                                        order="centered"
                                        :size="small"
                                        :simple="false"
                                        :rounded="true"
                                        :per-page="posts.per_page"
                                    >
                                    </o-pagination>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" v-else>
                    <div class="col-12">
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
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Datos</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table text-center">
                                        <tr>
                                            <td class="font-weight-bold">
                                                No hay registros
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            posts: [],
            isLoading: true,
            currentPage: 1,
            loading: true,
        };
    },
    methods: {
        updatePage() {
            setTimeout(this.getData, 200);
        },
        async getData() {
            this.loading = true;
            this.isLoading = true;
            const token = localStorage.getItem("token");

            try {
                const response = await axios.get(
                    "https://binfrix.com/api/user/",
                    {
                        headers: {
                            Authorization: `Bearer ${token}`,
                            accept: "application/json",
                        },
                    }
                );

                this.posts = response.data.data;
                this.loading = false;
                this.isLoading = false;
            } catch (error) {
                console.error("Error al obtener la lista de usuarios:", error);
            }
        },
    },
    async mounted() {
        this.getData();
    },
};
</script>
