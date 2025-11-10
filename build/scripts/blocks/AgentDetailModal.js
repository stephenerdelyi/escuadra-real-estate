import Modal from '../helpers/Modal';
import GetData from '../helpers/GetData';

class AgentDetailModal {
    constructor(root) {
        this.root = root;

        this.scroll_container = root.querySelector('.js-agent-detail-modal-scroller');

        this.fields = {
            name: root.querySelector('.js-agent-detail-modal-name'),
            accounts: root.querySelector('.js-agent-detail-modal-accounts'),
            email: root.querySelector('.js-agent-detail-modal-email'),
            phone: root.querySelector('.js-agent-detail-modal-phone'),
            bio: root.querySelector('.js-agent-detail-modal-bio'),
            license: root.querySelector('.js-agent-detail-modal-license'),
            service_areas: root.querySelector('.js-agent-detail-modal-areas'),
            specialties: root.querySelector('.js-agent-detail-modal-specialties')
        }

        this.modal = new Modal(this.root, (dataset) => {
            this.data = new GetData({
                endpoint: 'get-agent/' + dataset.agentId,
                callback: (data) => {
                    this.scroll_container.scrollTop = 0;
                    this.fields.name.innerHTML = data.name;

                    if(data.email) {
                        this.fields.email.parentElement.classList.remove('--hidden');
                        this.fields.email.innerHTML = data.email;
                        this.fields.email.setAttribute('href', 'mailto:' + data.email);
                    } else {
                        this.fields.email.parentElement.classList.add('--hidden');
                    }

                    if(data.phone) {
                        this.fields.phone.parentElement.classList.remove('--hidden');
                        this.fields.phone.innerHTML = data.phone.formatted;
                        this.fields.phone.setAttribute('href', data.phone.url);
                    } else {
                        this.fields.phone.parentElement.classList.add('--hidden');
                    }

                    if(data.license) {
                        this.fields.license.parentElement.classList.remove('--hidden');
                        this.fields.license.innerHTML = data.license;
                    } else {
                        this.fields.license.parentElement.classList.add('--hidden');
                    }

                    if(data.license) {
                        this.fields.license.parentElement.classList.remove('--hidden');
                        this.fields.license.innerHTML = data.license;
                    } else {
                        this.fields.license.parentElement.classList.add('--hidden');
                    }

                    if(data.service_areas && data.service_areas.length > 0) {
                        this.fields.service_areas.parentElement.classList.remove('--hidden');
                        this.fields.service_areas.innerHTML = data.service_areas.join(', ');
                    } else {
                        this.fields.service_areas.parentElement.classList.add('--hidden');
                    }

                    if(data.specialties && data.specialties.length > 0) {
                        this.fields.specialties.parentElement.classList.remove('--hidden');
                        this.fields.specialties.innerHTML = data.specialties.join(', ');
                    } else {
                        this.fields.specialties.parentElement.classList.add('--hidden');
                    }

                    if(data.bio) {
                        this.fields.bio.classList.remove('--hidden');
                        this.fields.bio.innerHTML = data.bio;
                    } else {
                        this.fields.bio.classList.add('--hidden');
                    }

                    this.fields.accounts.innerHTML = '';
                    data.social_accounts.forEach((account) => {
                        this.fields.accounts.insertAdjacentHTML('beforeend', this.makeSocialAccount(account));
                    });

                    this.root.classList.remove('--loading');
                }
            });
        });
    }

    makeSocialAccount(account) {
        return `<a class="modal-agent-detail__accounts__link" href="${account.url}" target="_blank"><img class="modal-agent-detail__accounts__icon" src="${window.theme.variables.build_url}/svgs/${account.type}.svg"/></a>`;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    var agent_detail_modals = document.querySelectorAll('.js-agent-detail-modal') ?? [];

    agent_detail_modals.forEach((agent_detail_modal) => {
        new AgentDetailModal(agent_detail_modal);
    });
});
