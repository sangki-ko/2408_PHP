<?php

fscanf (STDIN, "%s\n", $input);

$computer = random_int(1, 3);

    if($computer === 1) {
        $computer = "rock";
    }
    else if($computer === 2) {
        $computer = "paper";
    }
    else {
        $computer = "scissors";
    }

echo "나 : ".$input."\n";
echo "컴퓨터 : ".$computer."\n";

if($computer === $input) {
    echo "비겼습니다.";
}
else if($computer === "rock" && $input === "paper") {
    echo "이겼습니다.";
}
else if($computer === "paper" && $input === "rock") {
    echo "졌습니다.";
}
else if($computer === "rock" && $input === "scissors") {
    echo "졌습니다.";
}
else if($computer === "scissors" && $input === "rock") {
    echo "이겼습니다.";
}
else if($computer === "scissors" && $input === "paper") {
    echo "졌습니다.";
}
else if($computer === "paper" && $input === "scissors") {
    echo "이겼습니다.";
}