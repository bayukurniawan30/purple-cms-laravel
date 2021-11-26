<button class="uk-button uk-button-default uk-button-small" type="button">{{ __('general.select_language') }}</button>
<div class="language-dropdown" uk-dropdown>
    <ul class="uk-nav uk-dropdown-nav">
        @foreach($availableLocales as $key => $value)
            <li class="{{ ($value === $currentLocale) ? 'uk-active uk-text-bold' : '' }}"><a href="language/{{ $value }}" class="uk-text-uppercase"><img src="/master-assets/img/flag-{{ $value }}.svg" width="20"> {{ $value }}</a></li>
        @endforeach
    </ul>
</div>