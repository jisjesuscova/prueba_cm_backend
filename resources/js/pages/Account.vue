<template>
  <div>
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
          <div class="card-header">Cantidad Notificaciones</div>
          <div class="card-body">
            <h5 class="card-title">{{ notification_quantity }}</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <img :src="`../../template/dist/img/logo.jpg`" id="home_logo" alt="Logo Home">
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
      notification_quantity: 0
    };
  },
  methods: {
    async getNotificationQuantity() {
      const token = localStorage.getItem("token");

      alert(token)

      try {
        const response = await axios.get(
          "https://binfrix.com/api/notification/quantity/",
          {
            headers: {
                    Authorization: `Bearer ${token}`,
                    accept: "application/json",
                  },
                }
              );

            this.notification_quantity = response.data.data;
          } catch (error) {
                console.error("Error al obtener la cantidad:", error);
          }
      },
    },
    async mounted() {
        this.getNotificationQuantity();
    },
  }
</script>