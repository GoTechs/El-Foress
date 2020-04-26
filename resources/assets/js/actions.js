var namespaceActions = {
    addToFav: function (idAnnonce) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: "/addtofav/" + idAnnonce,
            type: "POST",
            data: {
                '_method': 'PATCH',
                '_token': csrf_token
            },
            success: function (data) {
                if (data == 'Unauthenticated') {
                    document.location.href = "/connexion";

                } else if (data == '1') {
                    swal("L'annonce a déjà été ajoutée aux favoris", "", "warning");

                } else if (data == 'owner') {
                    swal("Vous êtes le propriétaire de cette annonce!", "", "warning");
                } else {
                    swal("L'annonce a été ajoutée aux favoris", "", "success");
                }
            }
        })
    },
    deleteArchivedAd: function (id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
                title: "Êtes-vous sûr?",
                text: "Une fois supprimé, vous ne pourrez plus récupérer cette annonce!",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/update-AD/" + id,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': csrf_token
                        },
                        success: function (data) {
                            swal("Votre annonce a été supprimée!", {
                                icon: "success",
                            });
                            document.location.href = "/archives";
                        }
                    })
                }
            });
    },
    repostAd: function (id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
                title: "Êtes-vous sûr?",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/repostAd/" + id,
                        type: "POST",
                        data: {
                            '_method': 'PATCH',
                            '_token': csrf_token
                        },
                        success: function (data) {
                            swal("Votre annonce a été republiée!", {
                                icon: "success",
                            });
                            document.location.href = "/archives";
                        }
                    })
                }
            });
    },
    deleteAd: function (id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
                title: "Êtes-vous sûr?",
                text: "Une fois supprimé, vous ne pourrez plus récupérer cette annonce!",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/update-AD/" + id,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            '_token': csrf_token
                        },
                        success: function () {
                            swal("Votre annonce a été supprimée!", {
                                icon: "success",
                            });
                            document.location.href = "/my-ads";
                        }
                    })
                }
            });
    },
    archiveAd: function (id) {
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
                title: "Êtes-vous sûr?",
                icon: "warning",
                buttons: ["Annuler", "Oui"],
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "/archiveAd/" + id,
                        type: "POST",
                        data: {
                            '_method': 'PATCH',
                            '_token': csrf_token
                        },
                        success: function (data) {
                            swal("Votre annonce a été archivée!", {
                                icon: "success",
                            });
                            document.location.href = "/my-ads";
                        }
                    })
                }
            });
    },
    deleteFav: function(id){
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        swal({
          title: "Êtes-vous sûr?",
          icon: "warning",
          buttons: ["Annuler", "Oui"],
          dangerMode: true,
        })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  url : "/deleteFav/"+id,
                  type : "POST",
                  data : {'_method' : 'DELETE','_token':csrf_token},
                  success : function(){
                    swal("L'annonce a été supprimée des favoris", {
                      icon: "success",
                    });
                    document.location.href = "/favorites";
                  }
                })
              }
            });
      }
};