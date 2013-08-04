#!/bin/bash
optimize() {
  jpegoptim --max=75 *.jpg
  for i in *
  do
    if test -d $i
    then
      cd $i
      echo $i
      optimize
      cd ..
    fi
  done
  echo
}
optimize

