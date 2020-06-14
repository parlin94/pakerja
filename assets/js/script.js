$(function () {
    // Input Role
    $('.modal-title').on('click', function () {
        $('#newRoleModalLabel').html('Tambah Role');
        $('.modal-footer button[type=submit]').html('Tambah');

    });

    //Edit Role
    $('.tampilModalMenu').on('click', function () {
        $('#newRoleModalLabel').html('Edit Role');
        $('.modal-footer button[type=submit]').html('Edit');
        $('.modal-body form').attr('action', 'http://localhost/Pakerja/admin/editRole');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Pakerja/admin/roleGet',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#role').val(data.role);
                $('#id').val(data.id);
            }
        });
    });
    // ====================== MENU ============================
    // Input Menu
    $('.modal-judul').on('click', function () {
        $('#newMenuModalLabel').html('Tambah Menu');
        $('.add-modal button[type=submit]').html('Tambah');

    });
    // Menu
    $('.modalMenuTampil').on('click', function () {
        $('#newMenuModalLabel').html('Edit Menu');
        $('.add-modal button[type=submit]').html('Edit');
        $('.modal-content form').attr('action', 'http://localhost/Pakerja/menu/editMenu');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Pakerja/menu/getMenu',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {

                $('#menu').val(data.menu);
                $('#id').val(data.id);
            }

        });
    });
    // ====================== SUBMENU ============================
    // Input SUBMenu
    $('.modal-submenu').on('click', function () {
        $('#newMenuModalLabel').html('Tambah Menu');
        $('.modal-add button[type=submit]').html('Tambah');

    });
    // Edit SubMenu
    $('.modalSubmenuTampil').on('click', function () {
        $('#newMenuModalLabel').html('Edit Menu');
        $('.modal-add button[type=submit]').html('Edit');
        $('.modal-content form').attr('action', 'http://localhost/Pakerja/menu/editSubmenu');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Pakerja/menu/getSubmenu',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#title').val(data.title);
                $('#menu_id').val(data.menu_id);
                $('#url').val(data.url);
                $('#icon').val(data.icon);
                $('#is_active').val(data.is_active);
                $('#id').val(data.id);
            }

        });
    });

    // ====================== GEJALA ============================
    // Input Gejala
    $('.modal-input').on('click', function () {
        $('#newGejalaModalLabel').html('Tambah Gejala');
        $('.modal-addGejala button[type=submit]').html('Tambah');

    });
    // Edit Gejala
    $('.modalGejalaTampil').on('click', function () {
        $('#newGejalaModalLabel').html('Edit Gejala');
        $('.modal-addGejala button[type=submit]').html('Edit');
        $('.formGejala form').attr('action', 'http://localhost/Pakerja/gejala/editGejala');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Pakerja/gejala/getGejala',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {

                $('#kode_gejala').val(data.kode_gejala);
                $('#nama_gejala').val(data.nama_gejala);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });
    // ====================== Diagnosa ============================
    // Input Gejala
    $('.modal-diagnosa').on('click', function () {
        $('#newDiagnosaModalLabel').html('Tambah Diagnosa');
        $('.modal-addDiagnosa button[type=submit]').html('Tambah');

    });
    // Edit Gejala
    $('.modalDiagnosaTampil').on('click', function () {
        $('#newDiagnosaModalLabel').html('Edit Diagnosa');
        $('.modal-addDiagnosa button[type=submit]').html('Edit');
        $('.formDiagnosa form').attr('action', 'http://localhost/Pakerja/diagnosa/editDiagnosa');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Pakerja/diagnosa/getDiagnosa',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {

                $('#kode_diagnosa').val(data.kode_diagnosa);
                $('#nama_diagnosa').val(data.nama_diagnosa);
                $('#keterangan').val(data.keterangan);
                $('#id').val(data.id);
            }

        });
    });


    // ====================== Relasi ============================
    // Input Relasi
    $('.modal-relasi').on('click', function () {
        $('#newRelasiModalLabel').html('Tambah Relasi');
        $('.modal-addRelasi button[type=submit]').html('Tambah');

    });
    // Edit Relasi
    $('.modalRelasiTampil').on('click', function () {
        $('#newRelasiModalLabel').html('Edit Relasi');
        $('.modal-addRelasi button[type=submit]').html('Edit');
        $('.modal-content form').attr('action', 'http://localhost/Pakerja/relasi/editRelasi');

        const id = $(this).data('id');
        $.ajax({
            url: 'http://localhost/Pakerja/relasi/getRelasi',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                console.log(data);
                $('#gejala_id').val(data.gejala_id);
                $('#diagnosa_id').val(data.diagnosa_id);
                $('#mb').val(data.mb);
                $('#md').val(data.md);
                $('#id').val(data.id);
            }

        });
    });

    // ROLE ACCESS
    $('.custom-file-input').on('change', function () {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });



    $('.form-check-input').on('click', function () {
        const menuId = $(this).data('menu');
        const roleId = $(this).data('role');

        $.ajax({
            url: "<?= base_url('admin/changeaccess'); ?>",
            type: 'post',
            data: {
                menuId: menuId,
                roleId: roleId
            },
            success: function () {
                document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
            }
        });

    });

});
