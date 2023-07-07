<div class="mt-4 bg-white shadow py-6 px-4 sm:px-6 lg:px-8">
   @foreach($tokens as $token)
       {{$token->getCurrentPrice(resolve(\App\Repositories\ExchangeRepository::class))}}
   @endforeach
</div>
