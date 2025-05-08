@props(['products', 'amount', 'units', 'entries'])

<aside>
    <div class="img-container">
        <img src="" alt="logo">
    </div>

    <!--make a form component-->
    <form method="GET" action="{{ route('home') }}">
        <!--needs to generate database content-->
        <fieldset>
            <label for="products"> Product </label>
            <select required name="products" id="products">
                <option value="" disabled selected hidden>Choose your product..</option>

                @if ($products)
                    @foreach ($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                @else
                    <span>No products available</span>
                @endif

            </select>
        </fieldset>

        <fieldset>
            <label for="units">Unit</label>
            <select required name="units" id="units">
                <option value="" disabled selected hidden>Choose your product..</option>

                @if ($units)
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}">{{ $unit->label }} </option>
                    @endforeach
                @else
                    <span disabled>No products available</span>
                @endif

            </select>
        </fieldset>
        <fieldset>
            <label for="amount">Amount </label>
            <input type="number" name="amount" id="amount" placeholder="Choose your amount.." required>
        </fieldset>

        <fieldset>
            <button type="submit">Submit</button>
        </fieldset>

        <fieldset>
            <!--new hhtp request for resetting entries session-->
            <a href="{{ route('entries.reset') }}">
                <button type="button">Reset data</button>
            </a>
        </fieldset>
    </form>

</aside>
