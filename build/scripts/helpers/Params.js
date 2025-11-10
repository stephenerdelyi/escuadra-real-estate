export default class Params {
  constructor() {
    this.url = new URLSearchParams(window.location.search);
  }

  add(name, value) {
    this.url.append(name, value);
    this.updateUrl();
  }

  // Set will add if it does not exist, or update if it does
  set(name, value) {
    this.url.set(name, value);
    this.updateUrl();
  }

  remove(name) {
    this.url.delete(name);
    this.updateUrl();
  }

  get(name) {
    return this.url.get(name);
  }

  clear() {
    this.url = new URLSearchParams();
    this.updateUrl();
  }

  updateUrl() {
    if(this.url.toString()) {
      window.history.pushState(null, null, '?' + this.url.toString());
    } else {
      window.history.pushState(null, null, window.location.pathname);
    }
  }
}
