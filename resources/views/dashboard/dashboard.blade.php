@extends('layout.layout')

@section('content')


<div class="container-fluid d-flex justify-content-center align-items-center">
    <div>
        <div class="layout pr-4 pl-4 pt-3 pb-3">
            <div class="row mb-3">
                <div class="col-12">
                    <div class="form-group">
                        <div class="recipe-title">
                            Jenis Resep
                        </div>
                        <div class="recipe-subtitle mb-4">Pilih jenis resep</div>


                    </div>
                </div>
                <div class="col-12 col-lg-12">
                    <select id="jenisResep" class="form-control">
                        <option value="racikan">Racikan</option>
                        <option value="non">Non Racikan</option>
                    </select>
                </div>
                <!-- <div class="col-4 col-lg-3"> -->
                <!-- <button class="btn primary btn-block" id="pilihJenis">Pilih</button>
                </div> -->
            </div>
        </div>
        <div class="layout mt-3 pr-4 pl-4 pt-3 pb-3">
            <div class="row d-flex justify-content-center align-items-center mb-3">
                <div class="col-12 col-lg-12">
                    <div>
                        <div class="non mt-3 mb-3">
                            <div class="row">
                                <div class="col-8 col-lg-9">
                                    <div class="recipe-title">
                                        Resep Non Racikan
                                    </div>
                                    <div class="recipe-subtitle">Buat non resep racikan</div>
                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-end align-items-center">
                                    <button class="btn primary btn-block" id="simpanNonRacikan"> <i class="fas fa-save"></i> Simpan</button>
                                </div>
                            </div>
                            <div class="mt-3 row mt-5">
                                <div class="col-1 obat-number mb-0">
                                    <div>
                                        1
                                    </div>
                                </div>
                                <div class="col-11">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Obat</label>
                                        <input id="obat" class="obat form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Signa</label>
                                        <input class="signa form-control" id="signa" type="text">
                                    </div>
                                    <div class="form-group stock-display">
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="exampleInputEmail1">Stock tersedia</label>
                                                <input id="currentQuantity" class="form-control" type="number" disabled>
                                            </div>
                                            <div class="col-6">
                                                <label for="exampleInputEmail1">Quantity</label>
                                                <input id="quantity" class="form-control" type="number">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn secondary btn-block" id="checkStock">
                                        <i class="fas fa-search"></i> Cek Stock
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="racikan mt-3 mb-3">
                            <div class="row">
                                <div class="col-8 col-lg-9 d-flex align-items-center">
                                    <div>
                                        <div class="recipe-title">
                                            Resep Racikan
                                        </div>
                                        <div class="recipe-subtitle">Buat resep racikan</div>
                                    </div>
                                </div>
                                <div class="col-4 col-lg-3 d-flex justify-content-end align-items-center">
                                    <button class="btn primary btn-block" id="simpanRacikan"> <i class="fas fa-save"></i> &nbsp; Simpan</button>
                                </div>
                            </div>
                            <div class="resep_list">
                                <div class="mt-5 row">
                                    <div class="col-12 col-lg-1 obat-number mb-0">
                                        <div>
                                            1
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-11">
                                        <div class="form-group">
                                            <label for="obat">Nama Obat</label>
                                            <input class="obat form-control" value="" oninput=searchObat(1) autocomplete="off" id="obat-1" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="sigma">Signa</label>
                                            <input class="signa form-control" value="" oninput=searchSigna(1) autocomplete="off" id="signa-1" type="text">
                                        </div>
                                        <div class="form-group stock-display-1 d-none">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label for="stock-1">Stock tersedia</label>
                                                    <input class="form-control" id="stock-1" value="" type="number" disabled>
                                                </div>
                                                <div class="col-6">
                                                    <label for="qty">Quantity</label>
                                                    <input class="form-control" id="qty-1" value="" type="number">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn secondary btn-block" onclick="checkStockNon(1)">
                                            <i class="fas fa-search"></i> Cek Stock
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <div class="add-obat" onclick="tambahObat()"><i class="fas fa-plus"></i> Tambah Obat</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="layout mt-3 pr-4 pl-4 pt-3 pb-3">
            <div class="row d-flex justify-content-center mb-3">
                <div class="w-100">
                    <div class="recipe-title pl-2 pr-2">
                        Riwayat Resep
                    </div>
                    <div class="recipe-subtitle pl-2 pr-2 mb-4">Lihat riwayat resep</div>
                </div>
                <div class="w-100 table-responsive pl-2 pr-2">
                    <table class="table table-stripped table-hover no-wrap dt-responsive" id="withdrawTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Recipe Number</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="recipe-detail">
        <div>
            <div class="row pl-3">
                <div>
                    Recipe Detail
                </div>
                <div class="close-modal">
                    <i class="fas fa-times"></i>
                </div>
            </div>
            <div class="mt-2 list-obat">
                <!-- <div class="row">
                    <div class="col-10">
                        <div class="obat-value">Obat</div>
                        <div class="signa-value">signa</div>
                    </div>
                    <div class="col-2 stock-value">
                        25
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>
<style>
    * {
        font-family: 'neuzeit';
    }

    .primary {
        background-color: #275991;
        color: #fff;
    }

    .swal2-styled.swal2-confirm {
        background-color: #275991 !important;
    }

    .page-item.active .page-link {
        z-index: 1;
        color: #fff;
        background-color: #275991 !important;
        border-color: #275991 !important;
    }

    .secondary {
        border: 1px solid #2396A4 !important;
        color: #2396A4;
        background-color: transparent;
        /* color: #fff; */
    }

    @font-face {
        font-family: Neuzeit;
        src: url("{{ asset('font/Neuzeit/NeuzeitGrotesk-Reg.otf') }}");
    }

    .container-fluid {
        background-color: #EFECF8;
        padding: 2rem 0rem !important;
    }

    .layout {
        max-width: 600px;
        background-color: #fff;
        /* padding: 2rem 1rem; */
        border-radius: 10px;
        border: 1px solid #dadce0;
    }

    .stock-display,
    .non {
        display: none;
    }

    .recipe-title {
        font-size: 24px;
    }

    .recipe-subtitle {
        color: #A7A9BC;
        margin-top: -5px;
        font-size: 16px;
    }

    .obat-number {
        font-size: 2.1rem;
        margin-top: -8px;
        font-weight: 600;
        margin-bottom: 13px;
    }

    .obat-number>div {
        border-bottom: 1px solid #ced4da;
    }

    @media (min-width: 1024px) {

        .obat-number {
            font-size: 2.1rem;
            margin-top: -8px;
            border-right: 1px solid #ced4da;
            border-bottom: 0px;
            font-weight: 600;
        }


        .obat-number>div {
            border: 0;
        }

    }

    .add-obat {
        font-size: .7rem;
        margin-top: 10px;
        cursor: pointer;
        color: #2396A4;

    }

    .recipe-detail {
        width: 100%;
        height: 100%;
        position: fixed;
        background-color: rgb(0, 0, 0, 0.4);
        top: 0;
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 2;
    }

    .recipe-detail>div {
        width: 390px;
        height: fit-content;
        border-radius: 10px;
        background-color: #fff;
        padding: 1rem 2rem;
        position: relative;
        animation: .3s openModal ease-in-out;
        transition: transform .3s ease-out, -webkit-transform .3s ease-out;

    }

    @keyframes openModal {
        0% {
            opacity: 0;
            transform: translateY(-25%);
            -webkit-transform: translate(0, -25%);
        }

        100% {
            opacity: 1;
            transform: translate(0, 0);
            -webkit-transform: translate(0, 0);
        }
    }

    @keyframes closeModal {
        0% {
            transform: translate(0, 0);
            -webkit-transform: translate(0, 0);
            opacity: 1;
        }

        100% {
            transform: translateY(-25%);
            -webkit-transform: translate(0, -25%);
            opacity: 0;
        }
    }


    .recipe-detail>div>div>div:nth-child(1) {
        font-size: 1.5rem;
    }

    .obat-value {
        font-size: 1.1rem;
    }

    .signa-value {
        font-size: .8rem;
    }

    .stock-value {
        font-size: 1.1rem;
        text-align: right;
        /* font-weight: 600; */
    }

    .separator-obat {
        border-bottom: 1px solid #EFECF8;
    }

    .close-modal {
        position: absolute;
        right: 33px;
        top: 22px;
        font-size: 1.2rem;
    }

    .close-modal>i {
        cursor: pointer;
    }

    lord-icon {
        width: 25px;
    }

    tbody .created_at {
        color: #A7A9BC;
    }

    .dataTables_info {
        font-size: 12px;
    }
</style>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{ asset('js/download.js')}}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" language="javascript" src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.lordicon.com/lusqsztk.js"></script>

<script type="text/javascript">
    var obatPath = "{{ route('auto-complete-obat') }}";
    var signaPath = "{{ route('auto-complete-signa') }}";
    var length = 1;

    function tambahObat() {
        length += 1;
        var new_resep = `<div class="mt-5 row">
                            <div class="col-12 col-lg-1 obat-number mb-0">
                                <div>
                                    ` + length + `
                                </div>
                            </div>
                            <div class="col-12 col-lg-11">
                                <div class="form-group">
                                    <label for="obat">Nama Obat</label>
                                    <input class="obat form-control" value="" id="obat-` + length + `" oninput=searchObat(` + length + `) autocomplete="off" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="sgina">Signa</label>
                                    <input class="signa form-control" value="" id="signa-` + length + `" oninput=searchSigna(` + length + `) autocomplete="off" type="text">
                                </div>
                                <div class="form-group stock-display-` + length + ` d-none">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="stock">Stock tersedia</label>
                                            <input class="form-control" id="stock-` + length + `" value="" type="number" disabled>
                                        </div>
                                        <div class="col-6">
                                            <label for="qty">Quantity</label>
                                            <input class="form-control" id="qty-` + length + `" value="" type="number">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn secondary btn-block" onclick="checkStockNon(` + length + `)">
                                    <i class="fas fa-search"></i> Cek Stock
                                </button>
                            </div>
                        </div>`
        $('.resep_list').append(new_resep)

    }
    $('#jenisResep').on('change', function() {
        if ($('#jenisResep').val() == 'racikan') {
            $('.racikan').show();
            $('.non').hide();

        } else {
            $('.racikan').hide();

            $('.non').show();
        }
    })
    $('#quantity').on('input', function() {
        console.log($('#quantity').val(), $('#currentQuantity').val());
        if (parseInt($('#quantity').val()) > parseInt($('#currentQuantity').val())) {
            Swal.fire({
                title: 'input obat melebihi stock yang tersedia',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
            $('#quantity').val($('#currentQuantity').val());
        }
    })

    function searchObat(value) {

        $('input#obat-' + value).typeahead({
            source: function(query, process) {
                return $.get('/auto-complete-obat', {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        }).focus();
    }


    function searchSigna(value) {
        $('input#signa-' + value).typeahead({
            source: function(query, process) {
                return $.get('/auto-complete-signa', {
                    query: query
                }, function(data) {
                    return process(data);
                });
            }
        }).focus();
    }


    $('input#obat').typeahead({
        source: function(query, process) {
            return $.get(obatPath, {
                data: query
            }, function(data) {
                return process(data);
            });
        }
    });

    $('input#signa').typeahead({
        source: function(query, process) {
            return $.get(signaPath, {
                data: query
            }, function(data) {
                return process(data);
            });
        }
    });

    function checkStockNon(value) {
        if ($('#obat-' + value).val() == "" || $('#signa-' + value).val() == "") {
            Swal.fire({
                title: 'Harap isi nama obat & signa terlebih dahulu',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else {
            var data = {
                'data': $('#obat-' + value).val(),
            }
            $.ajax({
                type: "GET",
                url: 'stock-check',
                data: data,
                success: function(response) {
                    if (response == "") {
                        Swal.fire({
                            title: 'obat tidak ditemukan',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        })

                    } else {
                        $('.stock-display-' + value).show().removeClass('d-none');
                        $('#qty-' + value).attr('max', response.stok)
                        $('#stock-' + value).val(parseInt(response.stok))


                    }
                }
            });
        }

    }
    $('#checkStock').on('click', function() {
        if ($('#obat').val() == "" || $('#signa').val() == "") {
            Swal.fire({
                title: 'Harap isi nama obat & signa terlebih dahulu',
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            })
        } else {
            var data = {
                'data': $('#obat').val(),
            }
            $.ajax({
                type: "GET",
                url: 'stock-check',
                data: data,
                success: function(response) {
                    if (response == "") {
                        Swal.fire({
                            title: 'obat tidak ditemukan',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        })
                    } else {
                        $('.stock-display').show();
                        $('#simpanRacikan').show()
                        $('#checkStock').hide()
                        $('#quantity').attr('max', response.stok)
                        $('#currentQuantity').val(parseInt(response.stok))


                    }
                }
            });
        }
    })

    $('#simpanNonRacikan').on('click', function() {

        var data = {
            'obat': $('#obat').val(),
            'signa': $('#signa').val(),
            'qty': $('#quantity').val(),
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: 'create-non-racikan-recipe',
            data: data,
            success: function(response) {
                Swal.fire({
                    title: 'Berhasil menyimpan resep',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    },
                    confirmButtonColor: '#275991',
                    confirmButtonText: 'Oke'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                })

            }
        });

    })

    $('#simpanRacikan').on('click', function() {
        var resep_list = []
        for (let i = 1; i <= length; i++) {
            if ($('#obat-' + i).val() == "" || $('#signa-' + i).val() == "") {
                Swal.fire({
                    title: 'harap pilih obat dan signa',
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                })
                var resep_list = []
                break;
            } else {
                if ($('#qty-' + i).val() == "") {
                    Swal.fire({
                        title: 'harap masukan stock masing-masing obat',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        }
                    })
                    var resep_list = []
                    break;
                } else {
                    if ($('#qty-' + i).val() > $('#stock-' + i).val()) {
                        Swal.fire({
                            title: 'Jumlah obat yang dimasukkan melebih stock yang ada',
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        })
                        var resep_list = []
                        break;
                    } else {
                        resep_list.push({
                            'obat': $('#obat-' + i).val(),
                            'signa': $('#signa-' + i).val(),
                            'qty': $('#qty-' + i).val(),
                        })
                    }
                }
            }
        }
        if (resep_list.length != 0) {
            data = resep_list;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: 'create-racikan-recipe',
                data: {
                    formData: data
                },
                success: function(response) {
                    Swal.fire({
                        title: 'Berhasil menyimpan resep',
                        showClass: {
                            popup: 'animate__animated animate__fadeInDown'
                        },
                        hideClass: {
                            popup: 'animate__animated animate__fadeOutUp'
                        },
                        confirmButtonColor: '#275991',
                        confirmButtonText: 'Oke'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    })
                }
            });
        }
    })

    $('#withdrawTable').DataTable({
        "order": [],
        // "processing": true,
        // "pagingType": "full_numbers",
        "language": {
            processing: 'LOADING',
            searchPlaceholder: "Enter to search",
        },
        oLanguage: {
            sLengthMenu: "_MENU_",
        },
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        serverSide: true,
        stateSave: true,
        responsive: true,
        ordering: false,
        "stateSaveParams": function(settings, data) {
            data.search.search = "";
            data.order = [];
        },

        "lengthMenu": [
            [5, 10, 25, 50, 100],
            [5, 10, 25, 50, 100]
        ],

        ajax: {
            url: "recipe-list"

        },
        // buttons: false,
        searching: false,
        "columnDefs": [{
            "targets": [0],
            "visible": false
        }],
        columns: [{
                data: 'id',
                className: 'id'
            },
            {
                data: 'recipe_code',
                className: 'recipe_code'
            },
            {
                data: 'created_at',
                className: 'created_at',
                render: function(data, type, row) {
                    return moment(data).format("MM-DD-YYYY HH:mm");
                }
            },
            {
                data: function(row) {
                    return '<td><div style="display:inline-flex"><div style="width:30px"><lord-icon style="cursor:pointer;" src="https://cdn.lordicon.com/aixyixpa.json" trigger="hover" style="width:20px;height:20px" onclick="detailRecipe(' + row.id + ')"> </lord-icon></div><div style="width:30px;"><lord-icon style="cursor:pointer;" src="https://cdn.lordicon.com/biwxmlnf.json" trigger="hover"  onclick="download(' + row.id + ')" style="width:20px;height:20px"> </lord-icon></div></div></td>'
                }
            }
        ]
    });

    function detailRecipe(id) {
        var data = []
        $.ajax({
            type: "GET",
            url: 'detail-recipe',
            data: {
                'id': id
            },
            success: function(response) {
                data = response;
                $('.recipe-detail').css('display', 'flex')
                data.forEach(function(element) {
                    var item = `<div class="row separator-obat pb-2 pt-2 mb-2">
                                    <div class="col-9">
                                        <div class="obat-value">` + element.obat + `</div>
                                        <div class="signa-value">` + element.signa + `</div>
                                    </div>
                                    <div class="col-3 stock-value">
                                        ` + element.stok + `
                                    </div>
                                </div>`
                    $('.list-obat').append(item)
                })

            }
        });
    }

    function download(id) {
        window.location = "/download/" + id
    }

    $('.close-modal > i').on('click', function() {
        $('.recipe-detail > div').css('animation', '.3s closeModal ease-in-out')
        setTimeout(() => {
            $('.recipe-detail').hide();
            $('.list-obat').empty()
            $('.recipe-detail > div').css('animation', '.3s openModal ease-in-out')

        }, 250);
    })
</script>