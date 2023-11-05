<template>
    <div>
        <!-- /.navbar -->
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <router-link to="/" class="nav-link active" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-home"></i>
                            Inicio
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/notifications" class="nav-link" data-widget="pushmenu" @click="toggleSidebar">
                            <i class="nav-icon fas fa-handshake"></i>
                            Notificaciones
                        </router-link>
                    </li>
                    <li class="nav-item">
                        <a @click="Logout" href="javascript:;" class="nav-link">
                            <i class="nav-icon fas fa-door-open"></i>
                            Salir
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </div>
  </template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            rol_id: '',
            sidebarVisible: true
        }
    },
    methods: {
        toggleSidebar() {
            const pushMenuBtn = this.$refs.pushMenuBtn;

            $(pushMenuBtn).PushMenu('toggle');
        },
        Logout() {
            const token = localStorage.getItem('token')

            const formData = new FormData()
            formData.append('id', 1)

            axios.post('https://binfrix.com/api/user/logout', formData, {
                headers: {
                    Authorization: `Bearer ${token}`,
                    'Content-Type': 'multipart/form-data',
                },
            })
            .then(response => {
                localStorage.removeItem('token');
                window.location.href = '/';
            })
            .catch(error => {
                console.log(error);
            });
        }
    },
    mounted() {
        axios.get('/session-data')
        .then(response => {
            this.rol_id = response.data.rol_id;
        })
        .catch(error => {
            console.log(error);
        });
    }
}
</script>