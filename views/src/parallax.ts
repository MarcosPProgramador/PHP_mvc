const $ = <T>(elm?: T, bool?: boolean) => {
    const query = (elm: string) => <HTMLElement>document.querySelector(elm)
    const querys = (elm: string) => document.querySelectorAll(elm)

    const event = (
        value: string,
        listener: EventListenerOrEventListenerObject,
        options?: boolean | AddEventListenerOptions | undefined
    ): void => {
        if (typeof elm != 'string')
            document.addEventListener(value, listener, options)
        else query(elm).addEventListener(value, listener, options)
    }
    const attr = (qualifiedName: string) => {
        if (typeof elm == 'string')
            return query(elm).getAttribute(qualifiedName)
        if (elm instanceof Element) return elm.getAttribute(qualifiedName)
    }
    const add = (cls: string) => {
        if (typeof elm == 'string') query(elm).classList.add(cls)
    }
    const remove = (cls: string) => {
        if (typeof elm == 'string') query(elm).classList.remove(cls)
    }
    const toggle = (cls: string) => {
        if (typeof elm == 'string') return query(elm).classList.toggle(cls)
        if (elm instanceof HTMLElement) return elm.classList.toggle(cls)
    }
    const each = (
        callbackfn: (
            value: Element,
            key: number,
            parent: NodeListOf<Element>
        ) => void
    ) => {
        if (bool && typeof elm == 'string') querys(elm).forEach(callbackfn)
    }
    interface keyFor {
        [key: string]: string
    }
    const css = (style: keyFor) => {
        for (const key in style) {
            const value = style[key]
            const nKey = key.replace(/([A-Z])/, '-$1').toLowerCase()
            if (typeof elm == 'string')
                query(elm).style.setProperty(nKey, value)
            if (elm instanceof HTMLElement) elm.style.setProperty(nKey, value)
        }
    }
    return { event, attr, each, css, query, querys, add, remove, toggle }
}
const layers = $('.overlay__layer', true)
const animateWidthAndHeight = $('.overlay__animate')

setTimeout(() => {
    animateWidthAndHeight.add('full')
}, 700)
$(document).event('mousemove', ((e: MouseEvent) => {
    layers.each((elm) => {
        const speedImage = $(elm).attr('data-speed')
        const x = (window.innerWidth - e.pageX * Number(speedImage)) / 100
        const y = (window.innerHeight - e.pageY * Number(speedImage)) / 100
        $(elm).css({ transform: `translate(${x}px, ${y}px)` })
    })
}) as EventListener)

$('#btn-nav').event('click', <EventListener>((event: CustomEvent) => {
    const buttonNavbar = <HTMLElement>event.target
    const is = $(buttonNavbar).toggle('active')

    if (is) $('main').css({ overflow: 'hidden' })
    else $('main').css({ overflowY: 'auto' })

    $('#navbar').toggle('active')
}))
