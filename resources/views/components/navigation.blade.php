
<style>
    .navigation__container {
        padding: 0;
        display: flex;
        list-style: none;
    }

    .navigation__category {
        position: relative;
        text-align: center;
        flex: 1 1 auto;
        border-bottom: 8px solid transparent;
    }

    .navigation__category__link {
        font-weight: 400;
        font-family: sans-serif;
        color: #636b6f;
        font-size: 18px;
        cursor: pointer;
        text-align: center;
        padding: 5px;
        display: block;
    }

    .navigation__category__link:hover {
        color: black;
        transition: color 1s linear;
    }

    .navigation__category__container {
        padding: 5px 0;
        margin-top: 10px;
        list-style: none;
        background: white;
        position: absolute;
        border-radius: 5px;
    }
    .navigation__category__item {
        width: 100%;
    }

    .navigation__category__item__link {
        display: block;
        text-decoration: none;
        color: black;
        text-align: left;
        padding: 5px 10px;
    }

    .navigation__category__item__link:hover {
        background: aliceblue;
    }

    .hide + .navigation__category__container {
        display:none;
    }

    @media(max-width: 900px) {
        .navigation__container {
            flex-direction: column;
        }
        .container {
            padding: 0;
        }
        .navigation__category__container {
            position: static;
        }
        .navigation__category__item__link {
            text-align: center;
        }
    }

</style>

<ul class="navigation__container">
    @foreach ($nav->categories as $navCategory)
        <li class="navigation__category" style="border-bottom-color: {{$navCategory->colour}}">
            <a class="navigation__category__link hide">{{$navCategory->name}}</a>
            <ul class="navigation__category__container">
                @foreach ($navCategory->navigationItems as $navItem)
                    <li class="navigation__category__item">
                        <a class="navigation__category__item__link" href="{{$navItem->href}}">{{$navItem->name}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
