<?php
    $hasRan = $_POST['hasRan'];
    switch ($hasRan) {
        case 0:
            echo '<blockquote class="blockquote text-left interactive">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris pulvinar, mauris in
            vulputate malesuada, ipsum nulla convallis arcu, sit amet venenatis urna urna at libero</p>
            <footer class="blockquote-footer">Someone Someone <cite title="Source Title">Article</cite></footer>
            </blockquote>';
            break;
        case 1:
            echo '<blockquote class="blockquote text-left interactive">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin tristique libero nec turpis commodo, vitae.</p>
            <footer class="blockquote-footer">Someone Someone <cite title="Source Title">Article</cite></footer>
            </blockquote>';
            break;
        case 2:
            echo '<blockquote class="blockquote text-left interactive">
            <p class="mb-0">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas varius lacinia nibh,
            nec hendrerit ligula mollis quis. Phasellus euismod arcu sit amet leo scelerisque egestas.
            Integer tincidunt, leo at maximus vestibulum, leo enim pellentesque mauris, nec malesuada mi ante ac.</p>
            <footer class="blockquote-footer">Someone Someone <cite title="Source Title">Article</cite></footer>
            </blockquote>';
            break;
        case 3:
            echo '<blockquote class="blockquote text-left interactive">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <footer class="blockquote-footer">Someone Someone <cite title="Source Title">Article</cite></footer>
            </blockquote>';
            break;
        case 4:
            echo '<blockquote class="blockquote text-left interactive">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nunc.</p>
            <footer class="blockquote-footer">Someone Someone <cite title="Source Title">Article</cite></footer>
            </blockquote>';
            break;
        case 5:
            echo '<blockquote class="blockquote text-left interactive">
            <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi faucibus placerat mauris et suscipit.
            Phasellus condimentum massa quis.</p>
            <footer class="blockquote-footer">Someone Someone <cite title="Source Title">Article</cite></footer>
            </blockquote>';
            break;
        default:
            echo '<p>No more quotes left</p>';
    }
?>