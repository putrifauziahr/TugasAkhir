@extends('admin/layouts/admin')

@section('title', 'Perhitungan Fuzzy Servqual')

@section ('container')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header card">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title">
                                <div class="d-inline">
                                    <h4>Kebutuhan Perhitungan Fuzzy Servqual</h4>
                                    <span>Dashboard Admin</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="page-header-breadcrumb">
                                <ul class="breadcrumb-title">
                                    <li class="breadcrumb-item">
                                        <a href="index.html">
                                            <i class="icofont icofont-home"></i>
                                        </a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Data Master</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Fuzzy Servqual</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h5>Kebutuhan Fuzzy Servqual</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold;">Nilai Fuzzy Set </h6>
                        <table>
                            <tr>
                                <td>Tidak Puas </td>
                                <td></td>
                                <td> = </td>
                                <td>1</td>
                            </tr>

                            <tr>
                                <td>Kurang Puas </th>
                                <td></td>
                                <td> = </td>
                                <td>2</td>
                            </tr>

                            <tr>
                                <td>Cukup Puas </td>
                                <td></td>
                                <td> = </td>
                                <td>3</td>
                            </tr>

                            <tr>
                                <td>Puas </td>
                                <td></td>
                                <td> = </td>
                                <td>4</td>
                            </tr>

                            <tr>
                                <td>Sangat Puas </td>
                                <td></td>
                                <td> = </td>
                                <td>5</td>
                            </tr>

                        </table>
                    </div>

                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold;">Jumlah Sampel Berdasarkan Rumus Slovin</h6>
                        <table>
                            <tr>
                                <td>
                                    Total Sampel
                                </td>
                                <td> = </td>
                                <td>99</td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-body">
                        <h6 class="card-title" style="font-weight: bold;">Rumus Fuzzyfikasi </h6>
                        <table>

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection