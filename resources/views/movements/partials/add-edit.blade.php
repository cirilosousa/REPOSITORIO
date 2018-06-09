{{ csrf_field() }}


 <div class="form-group">
    <label for="movement_category_id" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
        <select name="category" id="category">
            <option value="expense">Expenses</option>
            <option value="revenue">Revenue</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type of Movement') }}</label>
        <select name="revenue" id="revenues">
            <option value="bonus">bonus </option>
            <option value="royalties">royalties </option>
            <option value="interests">interests </option>
            <option value="gifts">gifts </option>
            <option value="dividends">dividends </option>
            <option value="products sales">products sales </option>
        </select>
 
       
        <select name="expense" id="expenses">
            <option value="clothes">clothes</option>
            <option value="services">services </option>
            <option value="electricity">electricity </option>
            <option value="phone">phone </option>
            <option value="fuel">fuel </option>
            <option value="mortgage payment">mortgage payment </option>
            <option value="insurance">insurance </option>
            <option value="entertainment">entertainmen </option>
            <option value="culture">culture </option>
            <option value="trips">trips </option>
        </select>
    </div>
     <div class="form-group row">

                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required>

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
    <div class="form-group row">
        
        <label for="Value" class="col-md-4 col-form-label text-md-right">{{ __('Value') }}</label>
        <input id="value" type="text" name="value" rows="1" cols="30" value="{{ old('value') }}" required>
       
    </div>
     <div class="form-group row">
        
        <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>
        <input id="description" type="text" name="description" rows="1" cols="30" value="{{ old('description') }}" required >
       
    </div>
    <div class="form-group row">
        <label for="document_id" class="col-md-4 col-form-label text-md-right">{{ __('Document') }}</label>
        <div class="col-md-6">
            <input id="document" type="file" class="form-control{{ $errors->has('document') ? ' is-invalid' : '' }}" name="document" value="{{ old('document') }}" required>
             @if ($errors->has('document'))
            <span class="invalid-feedback">
            <strong>{{ $errors->first('document') }}</strong>
        </span>
        @endif
    </div>
</div>
   