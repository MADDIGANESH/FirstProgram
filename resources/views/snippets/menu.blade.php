
    <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/about">About</a></li>
            <li><a href="/contact">contact</a></li>
            <li><a href="/gallery">gallery</a></li>
            
            @auth
            <li><a href="{{ route('calculator.form')}}">Calculator App</a></li>
            @endauth

            @guest
            <li><a href="{{ route('login')}}">login</a></li>
            @endguest
    </ul>
                @auth
                <form action="{{route('logout')}}" method="post">
                @csrf
                <button type="submit" style="padding:10px 20px;background:red;">logout</button>
                </form>
                @endauth