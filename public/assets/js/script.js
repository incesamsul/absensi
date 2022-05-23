$(function() {
    let url = $('#base-url').attr('href').split('/');
    let baseurl = url[0] + '//' + url[2] + '/' + url[3];

    $('.app-brand').on('click', function() {
        document.location.href = '/absensi/Absensi';
    });


    $('.user-list').on('click', function(e) {
        let userid = $(this).data('userid');
        let name = $(this).children('.user-name').text();
        let bulan = 4;
        let trimName = $.trim(name);
        if (trimName == 'Arsal' || trimName == 'Asrul' || trimName == 'Ince') {
            document.location.href = '/absensi/Absensi/detailMalam/' + userid + '/' + bulan;
        } else {
            document.location.href = '/absensi/Absensi/detail/' + userid + '/' + bulan;
        }
    });

    // mobile script
    $('.float-button').on('click', function() {
        if ($(this).children().hasClass('fa-bars')) {
            $(this).children().removeClass('fa-bars');
            $(this).children().removeClass('fa-bars');
            $(this).children().addClass('fa-times');
        } else {
            $(this).children().addClass('fa-bars');
            $(this).children().removeClass('fa-times');

        }
        $('.list-pegawai').toggleClass('toggle');
    });

    // $('.user-list').on('click', function(e) {
    //     let userid = $(this).data('userid');
    //     $.ajax({
    //         url: baseurl + '/Absensi/detail/' + userid + '/' + 8,
    //         method: 'post',
    //         // dataType: 'json',
    //         data: { userid: userid, numBulan: 8 },
    //         success: function(data) {
    //             console.log(data);
    //             $('.detail-absen-pegawai').html(data);
    //         }
    //     });
    // });
    // $('.detail-absen').on('click', function(e) {
    //     e.preventDefault();
    //     let idUser = $(this).data('iduser');
    //     let numBulan = $(this).data('numbulan');
    //     $.ajax({
    //         // url: baseurl + '/Absensi/ajaxDetail',
    //         // method: 'post',
    //         // dataType: 'json',
    //         // data: { idUser: idUser, numBulan: numBulan },
    //         // success: function(data) {
    //         //     console.log(data);
    //         // }
    //     });
    // })


})