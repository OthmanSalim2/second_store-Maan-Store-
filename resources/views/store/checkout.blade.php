<x-store-layout>
    <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form class="ps-checkout__form" action="{{ route('checkout') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__billing">
                            <h3>Billing Detail</h3>
                            <div class="form-group form-group--inline">
                                <label>First Name<span>*</span>
                                </label>
                                <input class="form-control" name="billing_firstname"
                                    value="{{ old('billing_firstname', $user->name) }}" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Last Name<span>*</span>
                                </label>
                                <input class="form-control" name="billing_lastname"
                                    value="{{ old('billing_lastname', $user->name) }}" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Email Address<span>*</span>
                                </label>
                                <input class="form-control" name="billing_email"
                                    value="{{ old('billing_email', $user->email) }}" type="email">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Phone<span>*</span>
                                </label>
                                <input class="form-control" name="billing_phone"
                                    value="{{ old('billing_phone', $user->mobile) }}" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Address<span>*</span>
                                </label>
                                <input class="form-control" name="billing_address" value="{{ old('billing_address') }}"
                                    type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>City<span>*</span>
                                </label>
                                <input class="form-control" name="billing_city" value="{{ old('billing_city') }}"
                                    type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Postal Code<span>*</span>
                                </label>
                                <input class="form-control" name="billing_postalcode"
                                    value="{{ old('billing_postalcode') }}" type="text">
                            </div>
                            <div class="form-group form-group--inline">
                                <label>Country<span>*</span>
                                </label>
                                <select class="form-control" name="billing_country">
                                    @foreach ($countries as $code => $name)
                                        <option value="{{ $code }}"
                                            @if ($code == old('billing_country')) selected @endif>{{ $name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="ps-checkbox">
                                    <input class="form-control" type="checkbox" id="cb01">
                                    <label for="cb01">Create an account?</label>
                                </div>
                            </div>
                            <h3 class="mt-40"> Addition information</h3>
                            <div class="form-group form-group--inline textarea">
                                <label>Order Notes</label>
                                <textarea class="form-control" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                        <div class="ps-checkout__order">
                            <header>
                                <h3>Your Order</h3>
                            </header>
                            <div class="content">
                                <table class="table ps-checkout__products">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase">Product</th>
                                            <th class="text-uppercase">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->all() as $item)
                                            <tr>
                                                <td>{{ $item->product->name }} x{{ $item->quantity }}</td>
                                                <td>
                                                    <x-currency :amount="$item->quantity * $item->product->purchase_price" />
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Order Total</td>
                                            <td>
                                                <x-currency :amount="$cart->total()" />
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <footer>
                                <h3>Payment Method</h3>
                                <div class="form-group cheque">
                                    <div class="ps-radio">
                                        <input class="form-control" type="radio" id="rdo01" name="payment"
                                            checked>
                                        <label for="rdo01">Cheque Payment</label>
                                        <p>Please send your cheque to Store Name, Store Street, Store Town, Store State
                                            / County, Store Postcode.</p>
                                    </div>
                                </div>
                                <div class="form-group paypal">
                                    <div class="ps-radio ps-radio--inline">
                                        <input class="form-control" type="radio" name="payment" id="rdo02">
                                        <label for="rdo02">Paypal</label>
                                    </div>
                                    <ul class="ps-payment-method">
                                        <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                                        <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                                    </ul>
                                    <button type="submit" class="ps-btn ps-btn--fullwidth">Place Order<i
                                            class="ps-icon-next"></i></button>
                                </div>
                            </footer>
                        </div>
                        <div class="ps-shipping">
                            <h3>FREE SHIPPING</h3>
                            <p>YOUR ORDER QUALIFIES FOR FREE SHIPPING.<br> <a href="#"> Singup </a> for free
                                shipping on every order, every time.</p>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-store-layout>
