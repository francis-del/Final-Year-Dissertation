<?php

namespace atoum\atoum\report\fields\runner\atoum;

class logo extends cli
{
    public function __toString()
    {
        return "
              \033[48;5;16m  \033[0m   \033[0m                             \033[0m \033[48;5;16m  \033[0m
            \033[48;5;16m    \033[0m                                 \033[48;5;16m   \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;250m \033[48;5;16m  \033[0m                             \033[48;5;16m  \033[48;5;250m \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;250m   \033[48;5;16m                             \033[48;5;250m   \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;231m \033[48;5;250m            \033[48;5;16m  \033[48;5;153m       \033[48;5;16m  \033[48;5;250m            \033[48;5;231m \033[48;5;16m \033[0m
            \033[48;5;16m  \033[48;5;240m           \033[48;5;16m  \033[48;5;153m \033[48;5;111m         \033[48;5;153m \033[48;5;16m  \033[48;5;240m           \033[48;5;16m \033[0m
              \033[48;5;16m           \033[48;5;153m \033[48;5;111m             \033[48;5;153m \033[48;5;16m           \033[0m
                      \033[0m \033[48;5;16m  \033[48;5;153m \033[48;5;111m             \033[48;5;153m \033[48;5;16m  \033[0m
                      \033[48;5;16m   \033[48;5;153m \033[48;5;111m   \033[48;5;16m  \033[48;5;111m   \033[48;5;16m  \033[48;5;111m   \033[48;5;153m \033[48;5;16m   \033[0m
                    \033[48;5;16m  \033[48;5;68m \033[48;5;16m  \033[48;5;153m \033[48;5;111m   \033[48;5;16m  \033[48;5;111m   \033[48;5;16m  \033[48;5;111m   \033[48;5;153m \033[48;5;16m  \033[48;5;68m \033[48;5;16m  \033[0m
                    \033[48;5;16m     \033[48;5;153m \033[48;5;111m             \033[48;5;153m \033[48;5;16m     \033[0m
                      \033[0m \033[48;5;16m    \033[48;5;153m \033[48;5;111m         \033[48;5;153m \033[48;5;16m    \033[0m
                        \033[0m \033[48;5;16m  \033[48;5;153m \033[48;5;111m         \033[48;5;153m \033[48;5;16m  \033[0m
                        \033[0m \033[48;5;16m  \033[48;5;68m           \033[48;5;16m  \033[0m
                        \033[0m \033[48;5;16m  \033[48;5;68m  \033[48;5;16m   \033[48;5;68m \033[48;5;16m   \033[48;5;68m  \033[48;5;16m  \033[0m
                          \033[0m \033[48;5;16m  \033[48;5;68m       \033[48;5;16m  \033[0m
                            \033[0m \033[48;5;16m       \033[0m
            \033[0m" . PHP_EOL;
    }
}
