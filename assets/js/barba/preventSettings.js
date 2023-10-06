export const preventSettings = () => {
  // 該当クラスに属していればBarbaを無効に
  let ignoreClasses = ['prevent-barba'];
  ignoreClasses.forEach((cls) => {
    if (el.classList.contains(cls)) {
      return true;
    }
  });
};
