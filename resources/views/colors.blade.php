<x-app-layout>
    <h1>Colors</h1>

    <?php
        $text = "Colors: ";

        for ($i = 0; $i < count($colors); $i++){
            $text = $text . $colors[$i];
            if ($i < count($colors) - 1 ){
                $text = $text . ", ";
            }
        }
        echo $text;
    ?>
</x-app-layout>