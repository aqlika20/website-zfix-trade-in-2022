/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 92);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/metronic/js/pages/crud/ktdatatable/base/html-table.js":
/*!*************************************************************************!*\
  !*** ./resources/metronic/js/pages/crud/ktdatatable/base/html-table.js ***!
  \*************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
 // Class definition

var KTDatatableHtmlTableDemo = function () {
  var userManagement = function userManagement() {
    var datatable = $('#user_management').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      columns: [{
        field: '#',
        title: '#'
      }, {
        field: 'Name',
        title: 'Name'
      }, {
        field: 'Email',
        title: 'Email'
      }, {
        field: 'Role',
        title: 'Role',
        template: function(row) {
          var role = {
            1: {'roleName': 'Admin'},
            2: {'roleName': 'Staff'},
            3: {'roleName': 'Viewer'}
          };
          return role[row.Role].roleName;
        },
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false
      }]
    });
    $('#user_management_search_role').on('change', function () {
      datatable.search($(this).val().toLowerCase(), 'Role');
    });
    $('#user_management_search_query').on('input', function () {
      datatable.search($(this).val().toLowerCase(), 'Email');
    });
    $('#user_management_search_role').selectpicker();
  };

  var hargaLaptop = function hargaLaptop() {
    var datatable = $('#harga_laptop').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      columns: [{
        field: '#',
        title: '#'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Storage',
        title: 'Storage'
      },{
        field: 'Memory',
        title: 'Memory'
      }, {
        field: 'Price Grade A',
        title: 'Price Grade A'
      }, {
        field: 'Price Grade B',
        title: 'Price Grade B'
      }, {
        field: 'Price Grade C',
        title: 'Price Grade C'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false
      }]
    });
    $('#harga_laptop_search_query').on('input', function () {
      datatable.search($(this).val().toLowerCase(), 'Brand');
    });
  };

  var hargaPS = function hargaPS() {
    var datatable = $('#harga_ps').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      columns: [{
        field: '#',
        title: '#'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Storage',
        title: 'Storage'
      }, {
        field: 'Price Grade A',
        title: 'Price Grade A'
      }, {
        field: 'Price Grade B',
        title: 'Price Grade B'
      }, {
        field: 'Price Grade C',
        title: 'Price Grade C'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false
      }]
    });
    $('#harga_ps_search_query').on('input', function () {
      datatable.search($(this).val().toLowerCase(), 'Brand');
    });
  };

  var tbBaru = function tbBaru() {
    var datatable = $('#tb_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbProses = function tbProses() {
    var datatable = $('#tb_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbPending = function tbPending() {
    var datatable = $('#tb_pending').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_pendings').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'NIP');
    });
  };

  var tbSelesai = function tbSelesai() {
    var datatable = $('#tb_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbRejected = function tbRejected() {
    var datatable = $('#tb_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_rejects').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbApproved = function tbApproved() {
    var datatable = $('#tb_approved').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_approveds').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var registerNewPartner = function registerNewPartner() {
    var datatable = $('#register_new_partner').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      columns: [{
        field: '#',
        title: '#'
      }, {
        field: 'Name',
        title: 'Name'
      }, {
        field: 'Address',
        title: 'Address'
      }, {
        field: 'PIC',
        title: 'PIC',
      }, {
        field: 'Contact Person',
        title: 'Contact Person',
      }, {
        field: 'Partner Key',
        title: 'Partner Key',
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false
      }]
    });
    $('#register_new_partner_search_query').on('input', function () {
      datatable.search($(this).val().toLowerCase(), 'Partner Key');
    });
  };

  var tbHPBaru = function tbBaru() {
    var datatable = $('#tb_hp_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbHPProses = function tbProses() {
    var datatable = $('#tb_hp_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbHPSelesai = function tbSelesai() {
    var datatable = $('#tb_hp_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbHPRejected = function tbHPRejected() {
    var datatable = $('#tb_hp_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbLaptopBaru = function tbBaru() {
    var datatable = $('#tb_laptop_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbLaptopProses = function tbProses() {
    var datatable = $('#tb_laptop_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };


  var tbLaptopPending = function tbPending() {
    var datatable = $('#tb_laptop_pending').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_pendings').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'NIP');
    });
  };

  var tbLaptopSelesai = function tbSelesai() {
    var datatable = $('#tb_laptop_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };


  var tbLaptopRejected = function tbRejected() {
    var datatable = $('#tb_laptop_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_rejects').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbTVBaru = function tbBaru() {
    var datatable = $('#tb_tv_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_tv_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbTVProses = function tbProses() {
    var datatable = $('#tb_tv_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_tv_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbTVPending = function tbPending() {
    var datatable = $('#tb_tv_pending').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_tv_pendings').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'NIP');
    });
  };

  var tbTVSelesai = function tbSelesai() {
    var datatable = $('#tb_tv_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_tv_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbTVRejected = function tbRejected() {
    var datatable = $('#tb_tv_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_tv_rejects').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbPSBaru = function tbBaru() {
    var datatable = $('#tb_ps_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_ps_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbPSProses = function tbProses() {
    var datatable = $('#tb_ps_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_ps_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbPSPending = function tbPending() {
    var datatable = $('#tb_ps_pending').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_ps_pendings').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'NIP');
    });
  };

  var tbPSSelesai = function tbSelesai() {
    var datatable = $('#tb_ps_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_ps_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbPSRejected = function tbRejected() {
    var datatable = $('#tb_ps_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_ps_rejects').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbHPPartnerClaimed = function tbPartnerClaimed() {
    var datatable = $('#tb_hp_partner_claimed').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbLaptopPartnerClaimed = function tbPartnerClaimed() {
    var datatable = $('#tb_laptop_partner_claimed').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_laptop_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbTVPartnerClaimed = function tbPartnerClaimed() {
    var datatable = $('#tb_tv_partner_claimed').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_tv_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbPSPartnerClaimed = function tbPartnerClaimed() {
    var datatable = $('#tb_ps_partner_claimed').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_ps_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbKulkasBaru = function tbBaru() {
    var datatable = $('#tb_kulkas_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_kulkas_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbKulkasProses = function tbProses() {
    var datatable = $('#tb_kulkas_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_kulkas_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbKulkasPending = function tbPending() {
    var datatable = $('#tb_kulkas_pending').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_kulkas_pendings').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'NIP');
    });
  };

  var tbKulkasSelesai = function tbSelesai() {
    var datatable = $('#tb_kulkas_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_kulkas_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbKulkasRejected = function tbRejected() {
    var datatable = $('#tb_kulkas_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_kulkas_rejects').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbKulkasPartnerClaimed = function tbPartnerClaimed() {
    var datatable = $('#tb_kulkas_partner_claimed').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_kulkas_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };


  var tbMesinCuciBaru = function tbBaru() {
    var datatable = $('#tb_mesin_cuci_baru').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_mesin_cuci_barus').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbMesinCuciProses = function tbProses() {
    var datatable = $('#tb_mesin_cuci_proses').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Customer Name',
        title: 'Customer Name'
      }, {
        field: 'brand',
        title: 'brand'
      }, {
        field: 'Jenis Tv',
        title: 'Jenis Tv'
      }, {
        field: 'Price',
        title: 'Price'
      },{
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_mesin_cuci_proseses').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbMesinCuciPending = function tbPending() {
    var datatable = $('#tb_mesin_cuci_pending').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_mesin_cuci_pendings').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'NIP');
    });
  };

  var tbMesinCuciSelesai = function tbSelesai() {
    var datatable = $('#tb_mesin_cuci_selesai').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_mesin_cuci_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbMesinCuciRejected = function tbRejected() {
    var datatable = $('#tb_mesin_cuci_reject').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_mesin_cuci_rejects').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };

  var tbMesinCuciPartnerClaimed = function tbPartnerClaimed() {
    var datatable = $('#tb_mesin_cuci_partner_claimed').KTDatatable({
      data: {
        saveState: {
          cookie: false
        }
      },
      rows: {
        autoHide: false
      },
      layout: {
        scroll: true,
        customScrollbar: false,
        class: 'datatable-bordered',
      },
      columns: [{
        field: 'Tanggal Agenda',
        title: 'Tanggal Agenda'
      }, {
        field: 'No Surat',
        title: 'No Surat'
      }, {
        field: 'Instansi Pengusul',
        title: 'Instansi Pengusul'
      }, {
        field: 'Jenis Usulan',
        title: 'Jenis Usulan'
      }, {
        field: 'NIP',
        title: 'NIP'
      }, {
        field: 'Nama',
        title: 'Nama'
      }, {
        field: 'Action',
        title: 'Action',
        sortable: false,
        width: 200
      }]
    });
    $('#tb_mesin_cuci_selesais').on('keyup', function () {
      datatable.search($(this).val().toLowerCase(), 'Customer Name');
    });
  };
  return {
    // Public functions
    init: function init() {
      // init demo
      userManagement();
      hargaLaptop();
      hargaPS();
      tbBaru();
      tbProses();
      tbPending();
      tbSelesai();
      tbRejected();
      tbApproved()
      registerNewPartner();
      tbHPBaru();
      tbHPProses();
      tbHPSelesai();
      tbHPRejected();
      tbLaptopBaru();
      tbLaptopProses();
      tbLaptopPending();
      tbLaptopSelesai();
      tbLaptopRejected();
      tbTVBaru();
      tbTVProses();
      tbTVPending();
      tbTVSelesai();
      tbTVRejected();
      tbPSBaru();
      tbPSProses();
      tbPSPending();
      tbPSSelesai();
      tbPSRejected();
      tbLaptopPartnerClaimed();
      tbPSPartnerClaimed();
      tbTVPartnerClaimed();
      tbHPPartnerClaimed();
      tbKulkasBaru();
      tbKulkasProses();
      tbKulkasPending();
      tbKulkasSelesai();
      tbKulkasRejected();
      tbKulkasPartnerClaimed();
      tbMesinCuciBaru();
      tbMesinCuciProses();
      tbMesinCuciPending();
      tbMesinCuciSelesai();
      tbMesinCuciRejected();
      tbMesinCuciPartnerClaimed();
    }
  };
}();

jQuery(document).ready(function () {
  KTDatatableHtmlTableDemo.init();
});

/***/ }),

/***/ 92:
/*!*******************************************************************************!*\
  !*** multi ./resources/metronic/js/pages/crud/ktdatatable/base/html-table.js ***!
  \*******************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__("./resources/metronic/js/pages/crud/ktdatatable/base/html-table.js");


/***/ })

/******/ });