<template>
  <button class="btn btn-labeled btn-danger btn-xs" @click="hapus(url, status, pesan)">
    <span class="btn-label"><i class="fa fa-close"></i></span>
    <b>Hapus</b>
  </button>
</template>

<script>
export default {
  props: ['url', 'status', 'pesan'],
  methods: {
    hapus(link, status = 0, pesan = 'Hola!'){
      if (status == 0) {
        swal({
          title   : "Hapus",
          text    : "Yakin Ingin Hapus Data?",
          icon    : "warning",
          buttons : [
            "Batal",
            "Hapus",
          ],
        })
        .then((hapus) => {
          if (hapus) {
            swal({
              title  : "Berhasil",
              text   : "Data Akan dihapus",
              icon   : "success",
              timer  : 2500,
            });
            window.location = link;
          } else {
            swal({
              title  : "Batal",
              text   : "Data Batal dihapus",
              icon   : "info",
              timer  : 2500,
            })
          }
        });
      }else{
        swal({
          title   : "Hapus",
          text    : pesan,
          icon    : "warning",
          buttons : "OK",
        })
      }
    },
  },
}
</script>
