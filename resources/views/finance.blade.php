@extends('layout.app')
@section('content')

<div class="container">
    <div class="page">
        <div class="page__info">
            <span class="page__info--item">Insurance</span>
            <span class="page__info--item">Credit Cards</span>
            <span class="page__info--item">Bank Accounts</span>
        </div>
        <div class="page__banner" style="background: url('{{asset('assets/img/finance_bg.jpg')}}') no-repeat center center; background-size: cover;">
            <div class="row">
                <div class="col-md-6">
                    <h2>Get The Best Savings<br> Account for 2019 Now!</h2>

                    <p>Looking to open a new savings account, you’ve come to the right place. 
                        Find the right bank to start a relationship with based on interest rates, ATM network, online banking and more.</p>

                    <span class="page__banner--icons-title">Compare Savings Accounts From</span>

                    <div class="page__banner--icons">
                        <div>
                            <img src="{{asset('assets/img/dbs.svg')}}" alt="">
                        </div>
                        <div>
                            <img src="{{asset('assets/img/ocbc.svg')}}" alt="">
                        </div>
                        <div>
                            <img src="{{asset('assets/img/uob.svg')}}" alt="">
                        </div>
                    </div>

                    <!-- only mobile -->
                    <a href="#" class="btn d-md-none">Learn more</a>
                </div>
            </div>
        </div>
        <div class="page__content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="saving-tab" data-toggle="tab" href="#saving" role="tab" aria-controls="saving" aria-selected="true">Saving Banking</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="faq" aria-selected="false">FAQ</a>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="saving" role="tabpanel" aria-labelledby="saving-tab">
                    <div class="page__content--header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <span class="page__content--title">Saving Accounts</span>
                                <span class="page__content--text">UPDATED AS OF SEPTEMBER 2019</span>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="filter">Displaying all Savings Accounts from</label>
                                    
                                    <select name="" id="filter" class="select2-main">
                                        <option value="">All Banks</option>
                                        <option value="">DBS</option>
                                        <option value="">OCBC</option>
                                        <option value="">UOB</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="page__content--table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>Minimum<br> Interest<br> Rate</th>
                                    <th>Maximum<br> Interest<br> Rate</th>
                                    <th>Maximum<br> Initial<br> Deposit</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <span class="table__title">DBS Multiplier Account</span>
                                        <img width="133" src="{{asset('assets/img/dbs.svg')}}" alt="">
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">0.05%</span>
                                            <span class="rate--text">MIN RATE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">3.8%</span>
                                            <span class="rate--text">MAX RATE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">S$3,000</span>
                                            <span class="rate--text">INITIAL DEPOSIT</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="button">
                                            <a href="#" class="btn">Visit Website</a>
                                            <a href="#" class="like"></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="table__title">DBS Multiplier Account</span>
                                        <img width="182" src="{{asset('assets/img/ocbc.svg')}}" alt="">
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">0.05%</span>
                                            <span class="rate--text">MIN RATE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">3.8%</span>
                                            <span class="rate--text">MAX RATE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">S$3,000</span>
                                            <span class="rate--text">INITIAL DEPOSIT</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="button">
                                            <a href="#" class="btn">Visit Website</a>
                                            <a href="#" class="like"></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span class="table__title">DBS Multiplier Account</span>
                                        <img width="140" src="{{asset('assets/img/uob.svg')}}" alt="">
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">0.05%</span>
                                            <span class="rate--text">MIN RATE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">3.8%</span>
                                            <span class="rate--text">MAX RATE</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="rate">
                                            <span class="rate--value">S$3,000</span>
                                            <span class="rate--text">INITIAL DEPOSIT</span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="button">
                                            <a href="#" class="btn">Visit Website</a>
                                            <a href="#" class="like"></a>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">...</div>
              </div>

            <div class="promo">
                <h2>Finding the Best Savings Account<br> is Easy with <b>Haulmate</b></h2>

                <div class="row">
                    <div class="col-md-4">
                        <div class="promo--poster">
                            <img src="{{asset('assets/img/save1.svg')}}" alt="">
                        </div>
                        <span class="promo--title">Save Time</span>
                        <p>We've aggregated all the latest Savings accounts so you can compare them easily</p>
                    </div>
                    <div class="col-md-4">
                        <div class="promo--poster">
                            <img src="{{asset('assets/img/save2.svg')}}" alt="">
                        </div>
                        <span class="promo--title">Save Money</span>
                        <p>Find the best account suited for your needs by comparing the various options and what they offer</p>
                    </div>
                    <div class="col-md-4">
                        <div class="promo--poster">
                            <img src="{{asset('assets/img/save3.svg')}}" alt="">
                        </div>
                        <span class="promo--title">Hassle Free</span>
                        <p>Save yourself time and effort needed to get an account started by applying online through us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection