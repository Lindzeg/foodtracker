@props(['products','units', 'entries'])

    <aside>
        <div class="img-container">
            <img src="" alt="logo">
        </div>

<!--make a form component-->
        <form method="GET" action="{{ route('home') }}">
            <!--needs to generate database content-->
                <fieldset>
                    <label for="products"></label>
                    <select name="products" id="products">

                        <option value="" disabled selected hidden>Choose your product..</option>

                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name  }}</option>
                        @endforeach

                    </select>

                </fieldset>

                <fieldset>
                    <label for="units">Unit</label>
                    <select name="units" id="units">
                        <option value="" disabled selected hidden>Choose your product..</option>
                        @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->label }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset>
                    <label for="amount">Amount </label>
                    <input type="text" name="amount" id="amount" placeholder="Choose your amount..">
                </fieldset>

                <fieldset>
                    <button type="submit">Submit</button>
                </fieldset>
        </form>
    </aside>




