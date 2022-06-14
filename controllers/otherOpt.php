<?php

class otherOptions {

    public function generateOptionsMonths() {
        
        $months = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "aout", "septembre", "octobre", "novembre", "décembre"];
        $optionsMonths = [];

        foreach ($months as $i => $month) {
            $index = $i + 1;
            if ($index <= 9) {
                $optionsMonths[] = "<option value='0$index' name='month'>" . ucfirst($month) . "</option>";
            } else {
                $optionsMonths[] = "<option value='$index' name='month'>" . ucfirst($month) . "</option>";
            }
        }
        return $optionsMonths;
    }

    public function generateOptionsDays() {

        $i = 1;
        $optionsDays = [];

        while ($i <= 31) {
            if ($i <= 9) {
                $optionsDays[] = "<option value='0$i' name='day'>" . $i . "</option>";
            } else {
                $optionsDays[] = "<option value='$i' name='day'>" . $i . "</option>";
            }
            $i++;
        }
        return $optionsDays;
    }

    public function generateOptionsYears() {

        $i = 1950;
        $optionsYears = [];

        while ($i <= 2022) {
            $optionsYears[] = "<option value='$i' name='year'>$i</option>";
            $i++;
        }
        return $optionsYears;
    }

    public function sortArrayByDate(array &$arr) {

        usort($arr, function($a, $b) {

            if ($a["creat_tweet"] == $b["creat_tweet"]) {
                return 0;
            }

            return $a["creat_tweet"] > $b["creat_tweet"] ? -1 : 1;

        });
    }
}