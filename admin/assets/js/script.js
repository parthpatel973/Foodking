// JavaScript Document

/* global moment */
// Code goes here

var myApp = angular.module('myApp', ['ngAnimate']);

myApp.controller('MyCalendarSlider', DayPickerCtrl);

function DayPickerCtrl($scope) {
  var vm = this;
  
  vm.stagger = true;
  vm.dates = [];
  
  vm.selectedDate = moment().startOf('day').format();
  _changeDisplayedWeek(0);

  vm.selectDate = function (date) {
    vm.selectedDate = date.date;
  };

  vm.nextWeek = function () {
    vm.slideDirection = 'left';
    _changeDisplayedWeek(7);
  };

  vm.prevWeek = function () {
    vm.slideDirection = 'right';
    _changeDisplayedWeek(-7);
  };

  function _changeDisplayedWeek(daysToAdd) {
    var selectedDate = moment(vm.selectedDate).add(daysToAdd, 'days');
    vm.selectedDate = selectedDate.format();
    vm.weekOfYear = selectedDate.format('WW');
    vm.dates = _expandWeek(selectedDate);
  }

  function _expandWeek(startDate) {
    var dates = [];
    var dayOfWeek = moment(startDate).startOf('isoweek');
    for (var i = 0; i < 7; i++) {
      dates.push({
        weekDay: dayOfWeek.format('dd'),
        shortDate: dayOfWeek.format('DD.MM'),
        date: dayOfWeek.format()
      });
      dayOfWeek.add(1, 'd');
    }

    return dates;
  }
}